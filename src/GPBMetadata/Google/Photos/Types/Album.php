<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/photos/types/album.proto

namespace GPBMetadata\Google\Photos\Types;

class Album
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
google/photos/types/album.protogoogle.photos.types"�
Album

id (	
title (	
product_url (	
is_writeable (2

share_info (2.google.photos.types.ShareInfo
media_items_count (
cover_photo_base_url (	!
cover_photo_media_item_id (	"�
	ShareInfoE
shared_album_options (2\'.google.photos.types.SharedAlbumOptions
shareable_url (	
share_token (	
	is_joined (
is_owned (
is_joinable ("F
SharedAlbumOptions
is_collaborative (
is_commentable (Bg
com.google.photos.types.protoB
AlbumProtoPZ8google.golang.org/genproto/googleapis/photos/types;typesbproto3'
        , true);

        static::$is_initialized = true;
    }
}

