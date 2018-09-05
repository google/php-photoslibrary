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

use Google\Photos\Library\V1\PhotosLibraryClient;

checkCredentials($templates->render('share::connect'));
$photosLibraryClient = new PhotosLibraryClient(['credentials' => $_SESSION['credentials']]);

/**
 * Joins the album represented by the provided share token.
 */
if (isset($_GET['share-token'])) {
    try {
        $photosLibraryClient->joinSharedAlbum($_GET['share-token']);
        // Redirect the user to the list of shared albums -- the album they just joined will now
        // be in that list.
        header('Location: index.php');
    } catch (\Google\ApiCore\ApiException $e) {
        echo $templates->render('error', ['exception' => $e]);
    }
} else {
    echo $templates->render('join', ['exception' => 'A share token is required.']);
}
