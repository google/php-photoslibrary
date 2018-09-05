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

/**
 * Removes the app's access to the user's Photos account.
 */
if (isset($_GET['clear'])) {
    unset($_SESSION['credentials']);
}

checkCredentials($templates->render('albums::connect'));
$photosLibraryClient = new PhotosLibraryClient(['credentials' => $_SESSION['credentials']]);

/**
 * Retrieves the user's albums, and renders them in a grid.
 */
try {
    $pagedResponse = $photosLibraryClient->listAlbums();
    // By using iterateAllElements, pagination is handled for us.
    echo $templates->render(
        'albums::index',
        ['albums' => $pagedResponse->iterateAllElements()]
    );
} catch (\Google\ApiCore\ApiException $e) {
    echo $templates->render('error', ['exception' => $e]);
}
