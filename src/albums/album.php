<?php
/**
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

use Google\Photos\Library\V1\Album;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\Photos\Library\V1\PhotosLibraryResourceFactory;
use Google\Rpc\Code;

    /**
 * Allows the user to create a new album and edit an album, if the album is writeable.
 *
 */

require '../common/common.php';

checkCredentials($templates->render('albums::connect'));
$photosLibraryClient = new PhotosLibraryClient(['credentials' => $_SESSION['credentials']]);

/**
 * Creates a new album with the given name.
 *
 * If the album cannot be created, renders an error. Otherwise, the new ID is used for the later
 * rendering steps.
 */
if (isset($_GET['create'])) {
    $newAlbum = new Album();
    $newAlbum->setTitle($_GET['create']);
    try {
        $createdAlbum = $photosLibraryClient->createAlbum($newAlbum);
        $albumId = $createdAlbum->getId();
    } catch (\Google\ApiCore\ApiException $e) {
        echo $templates->render('error', ['exception' => $e]);
    }
}

/*
 * The album ID for this page can come from two places: the newly created album, or the existing ID
 * in  the request parameters. If there is an ID in the request parameters, and one hasn't just been
 * created then we use the one from the request parameters.
 */
if (isset($_GET['id']) && !isset($albumId)) {
    $albumId = $_GET['id'];
}

/**
 * Adds the uploaded media to the album at a given position.
 * Makes one upload call for each uploaded file, and then constructs NewMediaItems for each.
 * Finally, batchCreateMediaItems is called using the album ID set above,
 */
if (isset($_FILES['media_uploads'])) {
    $uploads = [];
    $numFiles = count($_FILES['media_uploads']['name']);
    $newMediaItems = [];
    for ($i = 0; $i < $numFiles; $i++) {
        $uploadToken = $photosLibraryClient->upload(
            file_get_contents($_FILES['media_uploads']['tmp_name'][$i]),
            $_FILES['media_uploads']['name'][$i]
        );
        $newMediaItems[] = PhotosLibraryResourceFactory::newMediaItem($uploadToken);
    }

    try {
        $batchCreateResponse =
            $photosLibraryClient->batchCreateMediaItems($newMediaItems, ['albumId' => $albumId]);
    } catch (\Google\ApiCore\ApiException $e) {
        echo $templates->render('error', ['exception' => $e]);
        die();
    }

    // An OK status (i.e., an exception wasn't thrown above) isn't sufficient to say all the items
    // succeeded. You also need to check the status in each NewMediaItemResult.s
    $statuses = [];
    foreach ($batchCreateResponse->getNewMediaItemResults() as $itemResult) {
        $status = $itemResult->getStatus();
        if ($status->getCode() != Code::OK) {
            $statuses[] = $status;
        }
    }

    if (count($statuses) > 0) {
        echo $templates->render('error', ['exception' => $statuses]);
        die();
    }
}

/**
 * Displays the album's media items, and functionality to add new items.
 */
if (isset($albumId)) {
    try {
        $album = $photosLibraryClient->getAlbum($albumId);
        $searchInAlbumResponse =
            $photosLibraryClient->searchMediaItems(['albumId' => $album->getId()]);
        echo $templates->render(
            'albums::album',
            ['album' => $album, 'mediaItems' => $searchInAlbumResponse->iterateAllElements()]
        );
    } catch (\Google\ApiCore\ApiException $e) {
        echo $templates->render('error', ['exception' => $e]);
    }
} else {
    echo $templates->render('error', ['exception' => 'An ID must be.']);
}
