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

$this->layout(
    'template',
    ['title' => 'Shared album',
    'back' => 'index.php',
    'additionalStylesheets' => ['views/style.css']]
)
?>

<div class="mdl-grid">
    <div id="album-header" class="mdl-cell mdl-cell--12-col">
        <h3><?= $album->getTitle() ?></h3>
        <a class="mdl-button mdl-button--raised mdl-button--primary"
           href="<?= $album->getProductUrl() ?>">
              Open in Google Photos
        </a>
    </div>
    <div class="mdl-cell mdl-cell--12-col">
        <?php if (null !== $album->getShareInfo()) : ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id='share-url' class="mdl-textfield__input" type="text"
                       value="<?= $album->getShareInfo()->getShareableUrl() ?>"/>
                <label class="mdl-textfield__label" for="share-url">Shareable URL</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="share-token" class="mdl-textfield__input" type="text"
                       value="<?= $album->getShareInfo()->getShareToken() ?>"/>
                <label class="mdl-textfield__label" for="share-token">Share Token</label>
            </div>
        <?php else : ?>
            <form method="post">
                <input type="hidden" name="id-to-share" value="<?= $album->getId() ?>"/>
                <label class="mdl-checkbox mdl-js-checkbox" for="is-collaborative">
                    <input id="is-collaborative" class="mdl-checkbox__input" type="checkbox"
                           name="is-collaborative"/>
                    <span class="mdl-checkbox__label">
                      Other users can add media items to this album.
                    </span>
                </label>
                <label class="mdl-checkbox mdl-js-checkbox" for="is-commentable">
                    <input id="is-commentable" class="mdl-checkbox__input" type="checkbox"
                           name="is-commentable"/>
                    <span class="mdl-checkbox__label">
                      Other users can add comments to the album.
                    </span>
                </label>
                <button class="mdl-button mdl-button--raised mdl-button--primary">Share</button>
            </form>`
        <?php endif ?>
    </div>

    <?php $this->insert('image_grid', ['mediaItems' => $mediaItems]); ?>
</div>
