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

use Google\ApiCore\ApiException;
use Google\Photos\Library\V1\FiltersBuilder;
use Google\Photos\Library\V1\PhotosLibraryClient;

require '../common/common.php';

/**
* Removes the user's credentials for Photos Library API access.
*/
if (isset($_GET['clear'])) {
    unset($_SESSION['credentials']);
}

/**
* Constructs a SearchMediaItems query from the form submission. If no query is set, then an
* unfiltered search is performed.
*/
$filtersBuilder = new FiltersBuilder();

if (isset($_GET['media-type'])) {
    // These media types strings are from the array PhotosLibraryClient::mediaTypes().
    $filtersBuilder ->setMediaTypeFromString($_GET['media-type']);
}

$filtersBuilder->setIncludeArchivedMedia(isset($_GET['archived-media']));

if (isset($_GET['included-categories'])) {
    foreach ($_GET['included-categories'] as $includedCategory) {
        // These category strings are from the array PhotosLibraryClient::contentCategories().
        $filtersBuilder->addIncludedCategoryFromString($includedCategory);
    }
}

if (isset($_GET['excluded-categories'])) {
    foreach ($_GET['excluded-categories'] as $excludedCategory) {
        // These category strings are from the array PhotosLibraryClient::contentCategories().
        $filtersBuilder->addExcludedCategoryFromString($excludedCategory);
    }
}

if (isset($_GET['start-date']) && $_GET['start-date'] != '') {
    $startDate = new DateTime($_GET['start-date']);

    if (isset($_GET['end-date']) && $_GET['end-date'] != '') {
        $endDate = new DateTime($_GET['end-date']);
        $filtersBuilder->addDateRangeFromDateTime($startDate, $endDate);
    } else {
        $filtersBuilder->addDateFromDateTime($startDate);
    }
}

/**
 * Sends the request, as constructed above, to the Photos Library API, and renders the response.
 */
checkCredentials($templates->render('filters::connect'));
$photosLibraryClient = new PhotosLibraryClient(['credentials' => $_SESSION['credentials']]);

try {
    $pagedResponse = $photosLibraryClient->searchMediaItems(
        ['filters' => $filtersBuilder->build()]
    );
    // Many accounts have too many media items to display on a single web page. Instead, we get a
    // single page of results. You can retrieve the page token from the $pagedResponse to populate
    // later pages.
    echo $templates->render(
        'filters::index',
        ['mediaItems' => $pagedResponse->getPage()->getIterator()]
    );
} catch (ApiException $e) {
    // If the API throws an error, render it. You can induce this by, for example, setting the page
    // size to be greater than the maximum. The exceptions are not user-friendly, this is just for
    // demonstrative purposes.
    echo $templates->render('error', ['exception' => $e]);
}
