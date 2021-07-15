<?php
/*
 * Copyright 2020 Google LLC
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
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

namespace Google\Photos\Library\Tests\Unit\V1;

use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Photos\Library\V1\AddEnrichmentToAlbumResponse;
use Google\Photos\Library\V1\AlbumPosition;
use Google\Photos\Library\V1\BatchAddMediaItemsToAlbumResponse;
use Google\Photos\Library\V1\BatchCreateMediaItemsResponse;
use Google\Photos\Library\V1\BatchGetMediaItemsResponse;
use Google\Photos\Library\V1\BatchRemoveMediaItemsFromAlbumResponse;
use Google\Photos\Library\V1\JoinSharedAlbumResponse;
use Google\Photos\Library\V1\LeaveSharedAlbumResponse;
use Google\Photos\Library\V1\ListAlbumsResponse;
use Google\Photos\Library\V1\ListMediaItemsResponse;
use Google\Photos\Library\V1\ListSharedAlbumsResponse;
use Google\Photos\Library\V1\NewEnrichmentItem;
use Google\Photos\Library\V1\SearchMediaItemsResponse;
use Google\Photos\Library\V1\ShareAlbumResponse;
use Google\Photos\Library\V1\UnshareAlbumResponse;
use Google\Photos\Types\Album;
use Google\Photos\Types\MediaItem;
use Google\Protobuf\FieldMask;
use Google\Rpc\Code;
use stdClass;

/**
 * Class PhotosLibraryClientTest
 *
 * @group library
 * @group gapic
 * @package Google\Photos\Library\Tests\Unit\V1
 */
class PhotosLibraryClientTest extends GeneratedTest
{
    /**
     * Creates mocked transport interface.
     *
     * @param mixed|null $deserialize
     * @return \Google\ApiCore\Transport\TransportInterface
     */
    private function createTransport($deserialize = null)
    {
        return new MockTransport($deserialize);
    }

    /**
     * Creates mocked credentials.
     *
     * @return \Google\ApiCore\CredentialsWrapper|\PHPUnit_Framework_MockObject_MockObject
     */
    private function createCredentials()
    {
        return $this->getMockBuilder(CredentialsWrapper::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * Creates client instance with credentials.
     *
     * @param array $options The options for photo library client.
     * @return \Google\Photos\Library\V1\PhotosLibraryClient
     * @throws \Google\ApiCore\ValidationException
     */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];

        return new PhotosLibraryClient($options);
    }

    /**
     * Album creation test.
     *
     * @throws \Google\ApiCore\ValidationException|\Google\ApiCore\ApiException
     */
    public function testCreateAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $id = 'id3355';
        $title = 'title110371416';
        $productUrl = 'productUrl-1491291617';
        $isWriteable = true;
        $mediaItemsCount = 927196149;
        $coverPhotoBaseUrl = 'coverPhotoBaseUrl145443830';
        $coverPhotoMediaItemId = 'coverPhotoMediaItemId840621207';
        $expectedResponse = new Album();
        $expectedResponse->setId($id);
        $expectedResponse->setTitle($title);
        $expectedResponse->setProductUrl($productUrl);
        $expectedResponse->setIsWriteable($isWriteable);
        $expectedResponse->setMediaItemsCount($mediaItemsCount);
        $expectedResponse->setCoverPhotoBaseUrl($coverPhotoBaseUrl);
        $expectedResponse->setCoverPhotoMediaItemId($coverPhotoMediaItemId);
        $transport->addResponse($expectedResponse);

        // Mock request
        $album = new Album();

        $response = $client->createAlbum($album);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/CreateAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getAlbum();

        $this->assertProtobufEquals($album, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Album creation test with API Exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testCreateAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $album = new Album();

        try {
            $client->createAlbum($album);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Batch create media items testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testBatchCreateMediaItems()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new BatchCreateMediaItemsResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $newMediaItems = [];

        $response = $client->batchCreateMediaItems($newMediaItems);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/BatchCreateMediaItems', $actualFuncCall);

        $actualValue = $actualRequestObject->getNewMediaItems();

        $this->assertProtobufEquals($newMediaItems, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Batch create media items testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testBatchCreateMediaItemsException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $newMediaItems = [];

        try {
            $client->batchCreateMediaItems($newMediaItems);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Batch add media items to album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testBatchAddMediaItemsToAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new BatchAddMediaItemsToAlbumResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $albumId = 'albumId1532078315';
        $mediaItemIds = [];

        $response = $client->batchAddMediaItemsToAlbum($albumId, $mediaItemIds);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/BatchAddMediaItemsToAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getAlbumId();

        $this->assertProtobufEquals($albumId, $actualValue);
        $actualValue = $actualRequestObject->getMediaItemIds();

        $this->assertProtobufEquals($mediaItemIds, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Batch add media items to album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testBatchAddMediaItemsToAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $albumId = 'albumId1532078315';
        $mediaItemIds = [];

        try {
            $client->batchAddMediaItemsToAlbum($albumId, $mediaItemIds);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Search media items testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testSearchMediaItems()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $nextPageToken = '';
        $mediaItemsElement = new MediaItem();
        $mediaItems = [$mediaItemsElement];
        $expectedResponse = new SearchMediaItemsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setMediaItems($mediaItems);
        $transport->addResponse($expectedResponse);

        $response = $client->searchMediaItems();
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getMediaItems()[0], $resources[0]);

        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();

        $this->assertSame('/google.photos.library.v1.PhotosLibrary/SearchMediaItems', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Search media items testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testSearchMediaItemsException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        try {
            $client->searchMediaItems();
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * List media items testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testListMediaItems()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $nextPageToken = '';
        $mediaItemsElement = new MediaItem();
        $mediaItems = [$mediaItemsElement];
        $expectedResponse = new ListMediaItemsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setMediaItems($mediaItems);
        $transport->addResponse($expectedResponse);

        $response = $client->listMediaItems();
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getMediaItems()[0], $resources[0]);

        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();

        $this->assertSame('/google.photos.library.v1.PhotosLibrary/ListMediaItems', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * List media items testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testListMediaItemsException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        try {
            $client->listMediaItems();
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Get media item testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testGetMediaItem()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $id = 'id3355';
        $description = 'description-1724546052';
        $productUrl = 'productUrl-1491291617';
        $baseUrl = 'baseUrl-1721160959';
        $mimeType = 'mimeType-196041627';
        $filename = 'filename-734768633';
        $expectedResponse = new MediaItem();
        $expectedResponse->setId($id);
        $expectedResponse->setDescription($description);
        $expectedResponse->setProductUrl($productUrl);
        $expectedResponse->setBaseUrl($baseUrl);
        $expectedResponse->setMimeType($mimeType);
        $expectedResponse->setFilename($filename);
        $transport->addResponse($expectedResponse);

        // Mock request
        $mediaItemId = 'mediaItemId720743532';

        $response = $client->getMediaItem($mediaItemId);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/GetMediaItem', $actualFuncCall);

        $actualValue = $actualRequestObject->getMediaItemId();

        $this->assertProtobufEquals($mediaItemId, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Get media item testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testGetMediaItemException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $mediaItemId = 'mediaItemId720743532';

        try {
            $client->getMediaItem($mediaItemId);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Batch get media items testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testBatchGetMediaItems()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new BatchGetMediaItemsResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $mediaItemIds = [];

        $response = $client->batchGetMediaItems($mediaItemIds);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/BatchGetMediaItems', $actualFuncCall);

        $actualValue = $actualRequestObject->getMediaItemIds();

        $this->assertProtobufEquals($mediaItemIds, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Batch get media items testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testBatchGetMediaItemsException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $mediaItemIds = [];

        try {
            $client->batchGetMediaItems($mediaItemIds);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * List albums testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testListAlbums()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $nextPageToken = '';
        $albumsElement = new Album();
        $albums = [$albumsElement];
        $expectedResponse = new ListAlbumsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setAlbums($albums);
        $transport->addResponse($expectedResponse);

        $response = $client->listAlbums();
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getAlbums()[0], $resources[0]);

        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();

        $this->assertSame('/google.photos.library.v1.PhotosLibrary/ListAlbums', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * List albums testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testListAlbumsException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        try {
            $client->listAlbums();
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Get album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testGetAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $id = 'id3355';
        $title = 'title110371416';
        $productUrl = 'productUrl-1491291617';
        $isWriteable = true;
        $mediaItemsCount = 927196149;
        $coverPhotoBaseUrl = 'coverPhotoBaseUrl145443830';
        $coverPhotoMediaItemId = 'coverPhotoMediaItemId840621207';
        $expectedResponse = new Album();
        $expectedResponse->setId($id);
        $expectedResponse->setTitle($title);
        $expectedResponse->setProductUrl($productUrl);
        $expectedResponse->setIsWriteable($isWriteable);
        $expectedResponse->setMediaItemsCount($mediaItemsCount);
        $expectedResponse->setCoverPhotoBaseUrl($coverPhotoBaseUrl);
        $expectedResponse->setCoverPhotoMediaItemId($coverPhotoMediaItemId);
        $transport->addResponse($expectedResponse);

        // Mock request
        $albumId = 'albumId1532078315';

        $response = $client->getAlbum($albumId);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/GetAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getAlbumId();

        $this->assertProtobufEquals($albumId, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Get album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testGetAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $albumId = 'albumId1532078315';

        try {
            $client->getAlbum($albumId);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Get shared album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testGetSharedAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $id = 'id3355';
        $title = 'title110371416';
        $productUrl = 'productUrl-1491291617';
        $isWriteable = true;
        $mediaItemsCount = 927196149;
        $coverPhotoBaseUrl = 'coverPhotoBaseUrl145443830';
        $coverPhotoMediaItemId = 'coverPhotoMediaItemId840621207';
        $expectedResponse = new Album();
        $expectedResponse->setId($id);
        $expectedResponse->setTitle($title);
        $expectedResponse->setProductUrl($productUrl);
        $expectedResponse->setIsWriteable($isWriteable);
        $expectedResponse->setMediaItemsCount($mediaItemsCount);
        $expectedResponse->setCoverPhotoBaseUrl($coverPhotoBaseUrl);
        $expectedResponse->setCoverPhotoMediaItemId($coverPhotoMediaItemId);
        $transport->addResponse($expectedResponse);

        // Mock request
        $shareToken = 'shareToken407816601';

        $response = $client->getSharedAlbum($shareToken);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/GetSharedAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getShareToken();

        $this->assertProtobufEquals($shareToken, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Get shared album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testGetSharedAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $shareToken = 'shareToken407816601';

        try {
            $client->getSharedAlbum($shareToken);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Add enrichment to album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testAddEnrichmentToAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new AddEnrichmentToAlbumResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $albumId = 'albumId1532078315';
        $newEnrichmentItem = new NewEnrichmentItem();
        $albumPosition = new AlbumPosition();

        $response = $client->addEnrichmentToAlbum($albumId, $newEnrichmentItem, $albumPosition);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/AddEnrichmentToAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getAlbumId();

        $this->assertProtobufEquals($albumId, $actualValue);
        $actualValue = $actualRequestObject->getNewEnrichmentItem();

        $this->assertProtobufEquals($newEnrichmentItem, $actualValue);
        $actualValue = $actualRequestObject->getAlbumPosition();

        $this->assertProtobufEquals($albumPosition, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Add enrichment to album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testAddEnrichmentToAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $albumId = 'albumId1532078315';
        $newEnrichmentItem = new NewEnrichmentItem();
        $albumPosition = new AlbumPosition();

        try {
            $client->addEnrichmentToAlbum($albumId, $newEnrichmentItem, $albumPosition);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Join shared album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testJoinSharedAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new JoinSharedAlbumResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $shareToken = 'shareToken407816601';

        $response = $client->joinSharedAlbum($shareToken);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/JoinSharedAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getShareToken();

        $this->assertProtobufEquals($shareToken, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Join shared album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testJoinSharedAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $shareToken = 'shareToken407816601';

        try {
            $client->joinSharedAlbum($shareToken);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Leave shared album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testLeaveSharedAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new LeaveSharedAlbumResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $shareToken = 'shareToken407816601';

        $response = $client->leaveSharedAlbum($shareToken);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/LeaveSharedAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getShareToken();

        $this->assertProtobufEquals($shareToken, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Leave shared album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testLeaveSharedAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $shareToken = 'shareToken407816601';

        try {
            $client->leaveSharedAlbum($shareToken);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Share album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testShareAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new ShareAlbumResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $albumId = 'albumId1532078315';

        $response = $client->shareAlbum($albumId);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/ShareAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getAlbumId();

        $this->assertProtobufEquals($albumId, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Share album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testShareAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $albumId = 'albumId1532078315';

        try {
            $client->shareAlbum($albumId);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * List shared albums testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testListSharedAlbums()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $nextPageToken = '';
        $sharedAlbumsElement = new Album();
        $sharedAlbums = [$sharedAlbumsElement];
        $expectedResponse = new ListSharedAlbumsResponse();
        $expectedResponse->setNextPageToken($nextPageToken);
        $expectedResponse->setSharedAlbums($sharedAlbums);
        $transport->addResponse($expectedResponse);

        $response = $client->listSharedAlbums();
        $this->assertEquals($expectedResponse, $response->getPage()->getResponseObject());
        $resources = iterator_to_array($response->iterateAllElements());
        $this->assertSame(1, count($resources));
        $this->assertEquals($expectedResponse->getSharedAlbums()[0], $resources[0]);

        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();

        $this->assertSame('/google.photos.library.v1.PhotosLibrary/ListSharedAlbums', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * List shared albums testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testListSharedAlbumsException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        try {
            $client->listSharedAlbums();
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Unshare album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testUnshareAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new UnshareAlbumResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $albumId = 'albumId1532078315';

        $response = $client->unshareAlbum($albumId);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/UnshareAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getAlbumId();

        $this->assertProtobufEquals($albumId, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Unshare album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testUnshareAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $albumId = 'albumId1532078315';

        try {
            $client->unshareAlbum($albumId);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Batch remove media items from album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testBatchRemoveMediaItemsFromAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $expectedResponse = new BatchRemoveMediaItemsFromAlbumResponse();
        $transport->addResponse($expectedResponse);

        // Mock request
        $albumId = 'albumId1532078315';
        $mediaItemIds = [];

        $response = $client->batchRemoveMediaItemsFromAlbum($albumId, $mediaItemIds);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/BatchRemoveMediaItemsFromAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getAlbumId();

        $this->assertProtobufEquals($albumId, $actualValue);
        $actualValue = $actualRequestObject->getMediaItemIds();

        $this->assertProtobufEquals($mediaItemIds, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Batch remove media items from album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testBatchRemoveMediaItemsFromAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $albumId = 'albumId1532078315';
        $mediaItemIds = [];

        try {
            $client->batchRemoveMediaItemsFromAlbum($albumId, $mediaItemIds);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Update album testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testUpdateAlbum()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $id = 'id3355';
        $title = 'title110371416';
        $productUrl = 'productUrl-1491291617';
        $isWriteable = true;
        $mediaItemsCount = 927196149;
        $coverPhotoBaseUrl = 'coverPhotoBaseUrl145443830';
        $coverPhotoMediaItemId = 'coverPhotoMediaItemId840621207';
        $expectedResponse = new Album();
        $expectedResponse->setId($id);
        $expectedResponse->setTitle($title);
        $expectedResponse->setProductUrl($productUrl);
        $expectedResponse->setIsWriteable($isWriteable);
        $expectedResponse->setMediaItemsCount($mediaItemsCount);
        $expectedResponse->setCoverPhotoBaseUrl($coverPhotoBaseUrl);
        $expectedResponse->setCoverPhotoMediaItemId($coverPhotoMediaItemId);
        $transport->addResponse($expectedResponse);

        // Mock request
        $album = new Album();
        $updateMask = new FieldMask();

        $response = $client->updateAlbum($album, $updateMask);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/UpdateAlbum', $actualFuncCall);

        $actualValue = $actualRequestObject->getAlbum();

        $this->assertProtobufEquals($album, $actualValue);
        $actualValue = $actualRequestObject->getUpdateMask();

        $this->assertProtobufEquals($updateMask, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Update album testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testUpdateAlbumException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $album = new Album();
        $updateMask = new FieldMask();

        try {
            $client->updateAlbum($album, $updateMask);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Update media item testing.
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function testUpdateMediaItem()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        // Mock response
        $id = 'id3355';
        $description = 'description-1724546052';
        $productUrl = 'productUrl-1491291617';
        $baseUrl = 'baseUrl-1721160959';
        $mimeType = 'mimeType-196041627';
        $filename = 'filename-734768633';
        $expectedResponse = new MediaItem();
        $expectedResponse->setId($id);
        $expectedResponse->setDescription($description);
        $expectedResponse->setProductUrl($productUrl);
        $expectedResponse->setBaseUrl($baseUrl);
        $expectedResponse->setMimeType($mimeType);
        $expectedResponse->setFilename($filename);
        $transport->addResponse($expectedResponse);

        // Mock request
        $mediaItem = new MediaItem();
        $updateMask = new FieldMask();

        $response = $client->updateMediaItem($mediaItem, $updateMask);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.photos.library.v1.PhotosLibrary/UpdateMediaItem', $actualFuncCall);

        $actualValue = $actualRequestObject->getMediaItem();

        $this->assertProtobufEquals($mediaItem, $actualValue);
        $actualValue = $actualRequestObject->getUpdateMask();

        $this->assertProtobufEquals($updateMask, $actualValue);
        $this->assertTrue($transport->isExhausted());
    }

    /**
     * Update media item testing with exception handling.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function testUpdateMediaItemException()
    {
        $transport = $this->createTransport();
        $client = $this->createClient(['transport' => $transport]);

        $this->assertTrue($transport->isExhausted());

        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';

        $expectedExceptionMessage = json_encode([
           'message' => 'internal error',
           'code' => Code::DATA_LOSS,
           'status' => 'DATA_LOSS',
           'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);

        // Mock request
        $mediaItem = new MediaItem();
        $updateMask = new FieldMask();

        try {
            $client->updateMediaItem($mediaItem, $updateMask);
            // If the $client method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }

        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }
}
