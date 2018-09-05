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
?>

<?php foreach ($albums as $album) : ?>
    <div class="mdl-cell mdl-cell--2-col album-cover">
        <a href="<?= $photoLink ?>?id=<?= $album->getId() ?>">
            <!-- The thumbnail is only 180x180px, so we request that size, rather than having
            the browser scale down a larger image. -->
            <img src="<?= $album->getCoverPhotoBaseUrl() . '=w180-h180-c' ?>"
                 alt="<?= $album->getTitle() ?>">
            <h5><?= $album->getTitle() ?></h5>
        </a>
        <p><?= $album->getMediaItemsCount() ?> items</p>
    </div>
<?php endforeach ?>