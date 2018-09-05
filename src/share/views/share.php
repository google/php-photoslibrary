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

$this->layout('template', ['title' => 'Select an album to share', 'back' => 'index.php'])
?>

<div class="mdl-grid">
    <p class="mdl-cell mdl-cell--12-col">This will only show albums that have been created by this
      project. Use the albums sample app to create some.</p>

    <?php $this->insert('album_grid', ['albums' => $albums, 'photoLink' => 'share.php']) ?>
</div>