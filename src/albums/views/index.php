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

$this->layout('template', ['title' => 'Photos Library API PHP Sample', 'additionalStylesheets' => ['views/style.css']])
?>

<dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">Create a new album</h4>
    <form action="album.php">
    <div class="mdl-dialog__content">
        <div class="mdl-textfield mdl-js-textfield">
            <input type="text" class="mdl-textfield__input" name="create" id="create"/>
            <label for="create" class="mdl-textfield__label">Title</label>
        </div>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Create</button>
        <a class="mdl-button close">Cancel</a>
    </div>
    </form>

</dialog>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col description">
        <h3>This is your Google Photos library</h3>
        <p>You've used the <span class="code">photoslibrary</span> scope to view the albums in the
          user's library.</p>
        <p>Use the create action to add a new album.</p>
        <button id='create-btn' class="mdl-button mdl-button--raised mdl-button--colored">Create</button>
    </div>

    <?php $this->insert('album_grid', ['albums' => $albums, 'photoLink' => 'album.php']);?>
</div>

<script>
  var dialog = document.querySelector('dialog');
  var showModalButton = document.querySelector('#create-btn');

  showModalButton.addEventListener('click', function() {
    dialog.showModal();
  });

  dialog.querySelector('.close').addEventListener('click', function() {
    dialog.close();
  });
</script>