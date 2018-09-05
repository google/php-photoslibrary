<?php $this->layout('template', ['title' => 'Filters Sample App']) ?>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <h3>This is your Google Photos library</h3>
        <?php if (isset($_GET['media-type'])
              || isset($_GET['included-categories'])
              || isset($_GET['excluded-categories'])
              || isset($_GET['start-date'])
              || isset($_GET['end-date'])) : ?>
            <p>You're viewing photos in the user's library that match your search filters.</p>
        <?php else :?>
            <p>You're viewing all photos in the user's library. Use the search action to refine your
              results with filters.</p>
        <?php endif ?>
        <a href="filters.php" class="mdl-button mdl-button--raised mdl-button--colored">Search</a>
    </div>
    <?php $this->insert('image_grid', ['mediaItems' => $mediaItems]) ?>
</div>
