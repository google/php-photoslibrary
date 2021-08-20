<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/photos/library/v1/photos_library.proto

namespace Google\Photos\Library\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The enrichment item that's created.
 *
 * Generated from protobuf message <code>google.photos.library.v1.AddEnrichmentToAlbumResponse</code>
 */
class AddEnrichmentToAlbumResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Enrichment which was added.
     *
     * Generated from protobuf field <code>.google.photos.library.v1.EnrichmentItem enrichment_item = 1;</code>
     */
    protected $enrichment_item = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Photos\Library\V1\EnrichmentItem $enrichment_item
     *           Output only. Enrichment which was added.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Photos\Library\V1\PhotosLibrary::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Enrichment which was added.
     *
     * Generated from protobuf field <code>.google.photos.library.v1.EnrichmentItem enrichment_item = 1;</code>
     * @return \Google\Photos\Library\V1\EnrichmentItem|null
     */
    public function getEnrichmentItem()
    {
        return isset($this->enrichment_item) ? $this->enrichment_item : null;
    }

    public function hasEnrichmentItem()
    {
        return isset($this->enrichment_item);
    }

    public function clearEnrichmentItem()
    {
        unset($this->enrichment_item);
    }

    /**
     * Output only. Enrichment which was added.
     *
     * Generated from protobuf field <code>.google.photos.library.v1.EnrichmentItem enrichment_item = 1;</code>
     * @param \Google\Photos\Library\V1\EnrichmentItem $var
     * @return $this
     */
    public function setEnrichmentItem($var)
    {
        GPBUtil::checkMessage($var, \Google\Photos\Library\V1\EnrichmentItem::class);
        $this->enrichment_item = $var;

        return $this;
    }

}

