<?php $this->layout('template', ['title' => "Your Media Item", 'back' => 'index.php']) ?>

<div id="photo">
    <div id="metadata">
        <table class="mdl-data-table mdl-js-data-table">
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Media Item ID</th>
                <td class="mdl-data-table__cell--non-numeric"><?= $mediaItem->getId() ?></td>
            </tr>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Creation Time</th>
                <td class="mdl-data-table__cell--non-numeric">
                    <?php
                    echo $mediaItem->getMediaMetadata()
                        ->getCreationTime()
                        ->toDateTime()
                        ->format('j F Y g:ia');
                    ?>
                </td>
            </tr>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Camera</th>
                <td class="mdl-data-table__cell--non-numeric">
                <?php
                if (null !== $mediaItem->getMediaMetadata()->getPhoto()) {
                    echo $mediaItem->getMediaMetadata()->getPhoto()->getCameraMake() . ' '
                        . $mediaItem->getMediaMetadata()->getPhoto()->getCameraModel();
                } elseif (null !== $mediaItem->getMediaMetadata()->getVideo()) {
                    echo $mediaItem->getMediaMetadata()->getVideo()->getCameraMake() . ' '
                        . $mediaItem->getMediaMetadata()->getVideo()->getCameraModel();
                }
                ?>
                </td>
            </tr>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Size</th>
                <td class="mdl-data-table__cell--non-numeric">
                    <?= $mediaItem->getMediaMetadata()->getWidth() . ' X ' .
                    $mediaItem->getMediaMetadata()->getHeight() ?>
                </td>
            </tr>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Camera Details</th>
                <?php if (null !== $mediaItem->getMediaMetadata()->getPhoto()) : ?>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $mediaItem->getMediaMetadata()->getPhoto()->getFocalLength() . ' ' .
                            $mediaItem->getMediaMetadata()->getPhoto()->getApertureFNumber() . ' ' .
                            $mediaItem->getMediaMetadata()->getPhoto()->getIsoEquivalent() . ' ' .
                            $mediaItem->getMediaMetadata()->getPhoto()->getExposureTime() ?>
                    </td>
                <?php elseif (null !== $mediaItem->getMediaMetadata()->getVideo()) : ?>
                    <td class="mdl-data-table__cell-non-numeric">
                        <?= $mediaItem->getMediaMetadata()->getVideo()->getFps() . 'fps';?>
                    </td>
                <?php endif ?>
            </tr>
        </table>
    </div>
    <img src="<?= $mediaItem->getBaseUrl() . '=w780' ?>"/>
</div>

