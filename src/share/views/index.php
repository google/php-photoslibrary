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

$this->layout('template', ['title' => 'Shared Albums'])
?>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col description">
        <h3>These are your Google Photos shared albums</h3>
        <p>You've used the <span class="code">.sharing</span> scope to view all shared albums in the
            user's library, that have been created with this project.</p>
        <p>Use the Share Album action to list all the available albums to share. </p>
        <p>Use the Join Album action to join a shared album using a share token.</p>
        <a class="mdl-button mdl-button--raised mdl-button--primary" href="join.php">
            Join another user's album
        </a>
        <a class="mdl-button mdl-button--raised mdl-button--primary" href="share.php">
            Share existing album
        </a>
    </div>


    <?php $this->insert('album_grid', ['albums' => $albums, 'photoLink' => 'share.php']); ?>
</div>