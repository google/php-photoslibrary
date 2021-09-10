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
    ['title' => "Apply Filters", 'additionalStylesheets' => ['views/style.css']]
)
?>

<h3>Load from search</h3>
<p>Load photos from your Google Photos library. Choose from the search options below. Try combining
    different categories and dates.</p>

<form action="index.php">
    <h4>Select a media type</h4>
    <div class="columns">
        <?php foreach ($mediaTypes as $mediaType) : ?>
        <div>
            <label class="mdl-radio mdl-js-radio" for="<?= $mediaType ?>">
                <input class="mdl-radio__button" type="radio" id="<?= $mediaType ?>"
                       name="media-type"
                       value="<?= $mediaType ?>">
                <span class="mdl-radio__label">
                    <?= str_replace("_", " ", ucfirst(strtolower($mediaType))) ?>
                </span>
            </label>
        </div>
        <?php endforeach ?>
    </div>

    <h4>Include these categories</h4>
    <div class="columns">
        <?php foreach ($categories as $category) : ?>
            <div>
                <label class="mdl-checkbox mdl-js-checkbox" for="include-<?= $category ?>">
                    <input class="mdl-checkbox__input" type="checkbox" id="include-<?= $category ?>"
                           name="included-categories[]"
                           value="<?= $category ?>">
                    <span class="mdl-checkbox__label"><?= ucfirst(strtolower($category)) ?></span>
                </label>
            </div>
        <?php endforeach ?>
    </div>

    <h4>Exclude these categories</h4>
    <div class="columns">
        <?php foreach ($categories as $category) : ?>
            <div>
                <label class="mdl-checkbox mdl-js-checkbox" for="exclude-<?= $category ?>">
                    <input class="mdl-checkbox__input" type="checkbox" id="exclude-<?= $category ?>"
                           name="excluded-categories[]"
                           value="<?= $category ?>">
                    <span class="mdl-checkbox__label"><?= ucfirst(strtolower($category)) ?></span>
                </label>
            </div>
        <?php endforeach ?>
    </div>


    <h4>Apply date filters</h4>
    <p>Select an individual date by leaving the end date empty.</p>
    <div class="columns">
        <div>
            <label class="mdl-checkbox" for="start-date">
                <span class="mdl-checkbox__label">Start</span>
                <input type="date" name="start-date"/>
            </label>
        </div>
        <div>
            <label class="mdl-radio" for="end-date">
                <span class="mdl-radio__label">End</span>
                <input type="date" name="end-date"/>
            </label>
        </div>
    </div>

  <h4>Item Features</h4>
  <div class="columns">
      <?php foreach ($features as $feature) : ?>
        <div>
          <label class="mdl-checkbox mdl-js-checkbox" for="include-feature-<?= $feature ?>">
            <input class="mdl-checkbox__input" type="checkbox" id="include-feature-<?= $feature ?>"
                   name="included-features[]"
                   value="<?= $feature ?>">
            <span class="mdl-checkbox__label"><?= ucfirst(strtolower($feature)) ?></span>
          </label>
        </div>
      <?php endforeach ?>
  </div>

  <h4>Toggle item properties</h4>
    <div >
        <div class="switch">
            <label class="mdl-switch mdl-js-switch" for="archived-media">
                <input class="mdl-switch__input" type="checkbox" id="archived-media"
                       name="archived-media">
                <span class="mdl-switch__label">Include media the user has archived</span>
            </label>
        </div>
        <div class="switch">
            <label class="mdl-switch mdl-js-switch" for="app-created-data">
                <input class="mdl-switch__input" type="checkbox" id="app-created-data"
                       name="app-created-data">
                <span class="mdl-switch__label">Exclude media created outside of this app</span>
            </label>
        </div>
    </div>

    <h4>Sort results</h4>
    <p>Sort results for searches that only include a date filter.</p>
    <div class="columns">
        <div>
            <label class="mdl-radio mdl-js-radio" for="option-default">
                <input type="radio" id="option-default" class="mdl-radio__button" name="sort" value="" checked>
                <span class="mdl-radio__label">Default (undefined)</span>
            </label>
        </div>
        <div>
            <label class="mdl-radio mdl-js-radio" for="option-newest">
                <input type="radio" id="option-newest" class="mdl-radio__button" name="sort" value="newestFirst">
                <span class="mdl-radio__label">Newest First</span>
            </label>
        </div>
        <div>
            <label class="mdl-radio mdl-js-radio" for="option-oldest">
                <input type="radio" id="option-oldest" class="mdl-radio__button" name="sort" value="oldestFirst">
                <span class="mdl-radio__label">Oldest First</span>
            </label>
        </div>
    </div>

    <br>

    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        Apply Filters
    </button>
</form>