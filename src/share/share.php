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

require '../common/common.php';

use Google\ApiCore\ApiException;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\Photos\Library\V1\SharedAlbumOptions;

checkCredentials($templates->render('share::connect'));
$photosLibraryClient = new PhotosLibraryClient(['credentials' => $_SESSION['credentials']]);

/**
 * Shares an existing album, given an ID.
 */
if (isset($_POST['id-to-share'])) {
    $options = new SharedAlbumOptions();
    $options->setIsCollaborative(isset($_POST['is-collaborative']));
    $options->setIsCommentable(isset($_POST['is-commentable']));

    try {
        $photosLibraryClient->shareAlbum($_POST['id-to-share'], ['sharedAlbumOptions' => $options]);
    } catch (ApiException $e) {
        echo $templates->render('error', ['exception' => $e]);
    }
}

/**
 * When an ID is provided, render information about an album. The content will depend on whether
 * the album has been shared already, or not.
 *
 * If an ID is not provided, then show all the albums that are able to be shared. This will also
 * show albums that the user owns and has already shared. You could filter these out by the presence
 * of the ShareInfo field.
 */
if (isset($_GET['id'])) {
    try {
        $album = $photosLibraryClient->getAlbum($_GET['id']);
        // We only want to demonstrate what's in the account, so select the first 10 items.
        $mediaItems = $photosLibraryClient
            ->searchMediaItems(['albumId' => $_GET['id'], 'pageSize' => 10])
            ->expandToFixedSizeCollection(10);
        echo $templates->render(
            'share::album',
            ['album' => $album, 'mediaItems' => $mediaItems]
        );
    } catch (ApiException $e) {
        echo $templates->render('error', ['exception' => $e]);
    }
} else {
    try {
        $pagedResponse = $photosLibraryClient->listAlbums();
        // By using iterateAllElements, pagination is handled for us.
        echo $templates->render(
            'share::share',
            ['albums' => $pagedResponse->iterateAllElements()]
        );
    } catch (ApiException $e) {
        echo $templates->render('error', ['exception' => $e]);
    }
}
