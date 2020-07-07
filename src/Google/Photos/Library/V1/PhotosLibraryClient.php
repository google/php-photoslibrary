<?php
/*
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * @experimental
 */

namespace Google\Photos\Library\V1;

use Google\ApiCore\ApiException;
use Google\Photos\Library\V1\Gapic\PhotosLibraryGapicClient;
use Google\Photos\Types\Album;
use Google\Photos\Types\MediaItem;
use Google\Protobuf\FieldMask;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

/**
 * {@inheritdoc}
 */
class PhotosLibraryClient extends PhotosLibraryGapicClient
{
    private $httpClient;
    private $uploadRetrySettings;
    const UPLOAD_URL = 'https://photoslibrary.googleapis.com/v1/uploads';

    /**
     * Returns a function that determines if a given request should be retried.
     *
     * The returned function returns true if the status was not okay, the error was in one of the
     * acceptable retry codes, and the maximum number of retries has not been exceeded.
     * @param UploadRetrySettings $uploadRetrySettings
     * @return \Closure
     */
    private function retryDecider($uploadRetrySettings)
    {
        return function ($retries, $request, $response, $error) use ($uploadRetrySettings) {
            if ($retries > $uploadRetrySettings->maxNumRetries) {
                return false;
            }

            if (null !== $error) {
                foreach ($uploadRetrySettings->retryableExceptions as $retryableException) {
                    if ($error instanceof $retryableException) {
                        return true;
                    }
                }

                return false;
            }

            // The response body is either an upload token, or a JSON representation of the
            // status. If it decodes into JSON, then it is not an upload token.
            $status = json_decode($response->getBody());
            if (null == $status) {
                // Don't retry if an upload token was received.
                return false;
            }

            // Otherwise, only retry on 'retryable codes'.
            return in_array($status['code'], $uploadRetrySettings['retryableCodes']);
        };
    }

    /**
     * Returns a function that determines the delay before a request is retried.
     *
     * Implements exponential backoff, with some maximum delay.
     * @param UploadRetrySettings $uploadRetrySettings
     * @return \Closure
     */
    private function retryDelay($uploadRetrySettings)
    {
        return function ($retries, $response) use ($uploadRetrySettings) {
            return min(
                $uploadRetrySettings->maxRetryDelayMillis,
                $uploadRetrySettings->initialRetryDelayMillis * pow(
                    $uploadRetrySettings->retryDelayMultiplier,
                    $retries
                )
            );
        };
    }

    /**
     * {@inheritdoc}
     */
    public function __construct($options = [])
    {
        parent::__construct($options);
        if (array_key_exists('uploadRetrySettings', $options)) {
            $this->uploadRetrySettings = new UploadRetrySettings($options['uploadRetrySettings']);
        } else {
            $this->uploadRetrySettings = new UploadRetrySettings(['retriesEnabled' => false]);
        }

        $stack = HandlerStack::create();

        if (null != $this->uploadRetrySettings && $this->uploadRetrySettings->retriesEnabled) {
            $stack->push(Middleware::retry(
                $this->retryDecider($this->uploadRetrySettings),
                $this->retryDelay($this->uploadRetrySettings)
            ));
        }

        if (isset($options['httpClient'])) {
            $this->httpClient = $options['httpClient'];
        } else {
            $this->httpClient = new Client(['handler' => $stack]);
        }
    }

    /**
     * Uploads a media item to Google. This won't create a media item in the user's Google Photos
     * library.
     *
     * @param string $rawFile The raw bytes of the file, obtained by something like
     *     file_get_contents().
     * @param string $fileName The name of the file to be uploaded. This is no longer recommended
     *     Filenames should be set in the batchCreate call instead.
     * @param string $mimeType The MIME type of the file to be uploaded. For example, text/html.
     * @return string An upload token
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function upload($rawFile, $fileName = '', $mimeType = '')
    {
        $headers = [
            'Content-type' => 'application/octet-stream',
            'Authorization' => $this->getCredentialsWrapper()->getBearerString(),
            'X-Goog-Upload-Protocol' => 'raw',
        ];

        if ($fileName) {;
            $headers['X-Goog-Upload-File-Name'] = $fileName;
        }
        if ($mimeType) {
            $headers['X-Goog-Upload-Content-Type'] = $mimeType;
        }

        $response = $this->httpClient->request(
            'POST',
            self::UPLOAD_URL,
            [
                'headers' => $headers,
                'body' => $rawFile,
                'timeout' => $this->uploadRetrySettings->retriesEnabled
                    ? $this->uploadRetrySettings->singleTimeoutMillis
                    : 0
            ]
        );

        return (string)$response->getBody();
    }

    /**
     * Updates the album with a new title.
     *
     * The album must have been created by the developer via the API and
     * must be owned by the user.
     *
     * @param string $albumId Identifier of the [Album][google.photos.types.Album] to update
     * @param string $newTitle Required. The new title of the album.
     * @param array $optionalArgs
     *
     * @return \Google\Photos\Types\Album
     *
     * @throws ApiException if the remote call fails
     * @see updateAlbum
     */
    public function updateAlbumTitle($albumId, $newTitle, array $optionalArgs = [])
    {
        $newAlbum = new Album();
        $newAlbum->setId($albumId);
        $newAlbum->setTitle($newTitle);

        $updateMask = new FieldMask(['paths' => ['title']]);

        return parent::updateAlbum($newAlbum, $updateMask, $optionalArgs);
    }

    /**
     * Updates the album with a new cover photo.
     *
     * The album must have been created by the developer via the API and
     * must be owned by the user.
     *
     * The $newCoverMediaItemId must be the identifier of a media item contained within the
     * album.
     *
     * @param string $albumId Identifier of the [Album][google.photos.types.Album] to update
     * @param string $newCoverMediaItemId Required. The identifier of the new media item cover photo.
     * @param array $optionalArgs
     *
     * @return \Google\Photos\Types\Album
     *
     * @throws ApiException if the remote call fails
     * @see updateAlbum
     *
     */
    public function updateAlbumCoverPhoto($albumId, $newCoverMediaItemId, array $optionalArgs = [])
    {
        $newAlbum = new Album();
        $newAlbum->setId($albumId);
        $newAlbum->setCoverPhotoMediaItemId($newCoverMediaItemId);

        $updateMask = new FieldMask(['paths' => ['cover_photo_media_item_id']]);

        return parent::updateAlbum($newAlbum, $updateMask, $optionalArgs);
    }
    /**
     * Updates the media item with a new description.
     *
     * The media item must have been created by the developer via the API and
     * must be owned by the user.
     *
     * @param string $mediaItemId Required. Identifier of the [MediaItem][google.photos.types.MediaItem] to update.
     * @param string $newDescription The new description for the media item.
     * @param array $optionalArgs
     *
     * @return \Google\Photos\Types\MediaItem
     *
     * @throws ApiException if the remote call fails
     */
    public function updateMediaItemDescription($mediaItemId, $newDescription, array $optionalArgs = [])
    {
        $newItem = new MediaItem();
        $newItem->setId($mediaItemId);
        $newItem->setDescription($newDescription);

        $updateMask = new FieldMask(['paths' => ['description']]);

        return parent::updateMediaItem($newItem, $updateMask, $optionalArgs);
    }

    public static function contentCategories()
    {
        return ['NONE', 'LANDSCAPES', 'RECEIPTS', 'CITYSCAPES', 'LANDMARKS', 'SELFIES', 'PEOPLE',
            'PETS', 'WEDDINGS', 'BIRTHDAYS', 'DOCUMENTS', 'TRAVEL', 'ANIMALS', 'FOOD', 'SPORT',
            'NIGHT', 'PERFORMANCES', 'WHITEBOARDS', 'SCREENSHOTS', 'UTILITY'];
    }

    public static function mediaTypes()
    {
        return ['ALL_MEDIA', 'PHOTO', 'VIDEO'];
    }

    public static function features()
    {
        return ['NONE', 'FAVORITES'];
    }

}
