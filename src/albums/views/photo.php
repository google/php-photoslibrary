<?php $this->layout('template', ['title' => $mediaItem->getDescription()]) ?>

<div class="mdl-grid">
  <img id="thumbnail" src="<?= $mediaItem->getBaseUrl() . '=w1000' ?>"/>
  <div class="mdl-cell mdl-cell--12-col" id="metadata">
    <p><?= $mediaItem->getDescription() ?></p>
    <p>
      <i class="material-icons">date_range</i>
        <?=
        // Convert the Timestamp into a human-readable date and time.
        $mediaItem->getMediaMetadata()->getCreationTime()->toDateTime()->format('F j, Y g:ia')
        ?>
    </p>
  </div>
</div>

