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

if ($album->getIsWriteable()) {
    $title = "Add images to album";
} else {
    $title = "View images in album";
}

$this->layout('template', ['title' => $title,
    'back' => 'index.php', 'additionalStylesheets' => ['views/style.css']]);
?>

<div class="mdl-grid">

    <div id="album-header" class="mdl-cell mdl-cell--12-col">
        <h3><?= $album->getTitle() ?></h3>
        <a class="mdl-button mdl-button--primary"
           href="<?= $album->getProductUrl() ?>">Open in Google Photos</a>
    </div>

    <?php if ($album->getIsWriteable()) : ?>
    <div class="mdl-cell mdl-cell--12-col">
        <form method="post" enctype="multipart/form-data"
              action="album.php?id=<?= $album->getId() ?>">
            <label id="upload-label"
                   class="mdl-button mdl-button--raised mdl-button--primary"
                   for="media-uploads">
              Choose files
            </label>
            <input type="file" id="media-uploads"
                   class="mdl-button mdl-js-button mdl-button--primary"
                   name="media_uploads[]" data-multiple-caption="{count} files selected" multiple>
            <button id="add-btn" class="mdl-button mdl-button--raised mdl-button--primary">
              Add to end of album
            </button>
        </form>
    </div>
    <?php endif ?>

    <?php $this->insert('image_grid', ['mediaItems' => $mediaItems]); ?>

</div>

<?php $this->push('scripts') ?>
  <script>
    document.querySelector('#media-uploads').addEventListener('change', function (e) {
      var fileName = '';
      if (this.files && this.files.length > 1) {
        fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}',
            this.files.length);
      } else {
        fileName = e.target.value.split('\\').pop();
      }
      document.querySelector('#upload-label').innerHTML = fileName;
      document.querySelector('#upload-label').classList.remove("mdl-button--raised");

      document.querySelector('#add-btn').style.visibility = "visible";
    })
  </script>
<?php $this->end(); ?>