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
use Google\ApiCore\ApiException;

/*
* Removes the user's credentials for Photos Library API access.
*/
if (isset($_GET['clear'])) {
    unset($_SESSION['credentials']);
}

/*
 * Requests all of the user's albums. If there are no albums, directs the user to create some using
 * the 'albums' sample app.
 */
checkCredentials($templates->render('share::connect'));
$photosLibraryClient = new PhotosLibraryClient(['credentials' => $_SESSION['credentials']]);
try {
    $pagedResponse = $photosLibraryClient->listSharedAlbums();
    // By using iterateAllElements, pagination is handled for us.
    echo $templates->render(
        'share::index',
        ['albums' => $pagedResponse->iterateAllElements()]
    );
} catch (ApiException $e) {
    echo $templates->render('error', ['exception' => $e]);
}
