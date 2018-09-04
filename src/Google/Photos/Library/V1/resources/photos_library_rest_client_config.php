<?php

return [
    'interfaces' => [
        'google.photos.library.v1.PhotosLibrary' => [
            'CreateAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/albums',
                'body' => '*',
            ],
            'BatchCreateMediaItems' => [
                'method' => 'post',
                'uriTemplate' => '/v1/mediaItems:batchCreate',
                'body' => '*',
            ],
            'SearchMediaItems' => [
                'method' => 'post',
                'uriTemplate' => '/v1/mediaItems:search',
                'body' => '*',
            ],
            'ListMediaItems' => [
                'method' => 'get',
                'uriTemplate' => '/v1/mediaItems',
            ],
            'GetMediaItem' => [
                'method' => 'get',
                'uriTemplate' => '/v1/mediaItems/{media_item_id=*}',
                'placeholders' => [
                    'media_item_id' => [
                        'getters' => [
                            'getMediaItemId',
                        ],
                    ],
                ],
            ],
            'ListAlbums' => [
                'method' => 'get',
                'uriTemplate' => '/v1/albums',
            ],
            'GetAlbum' => [
                'method' => 'get',
                'uriTemplate' => '/v1/albums/{album_id=*}',
                'additionalBindings' => [
                    [
                        'method' => 'get',
                        'uriTemplate' => '/v1/sharedAlbums/{share_token=*}',
                    ],
                ],
                'placeholders' => [
                    'album_id' => [
                        'getters' => [
                            'getAlbumId',
                        ],
                    ],
                ],
            ],
            'AddEnrichmentToAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/albums/{album_id=*}:addEnrichment',
                'body' => '*',
                'placeholders' => [
                    'album_id' => [
                        'getters' => [
                            'getAlbumId',
                        ],
                    ],
                ],
            ],
            'JoinSharedAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/sharedAlbums:join',
                'body' => '*',
            ],
            'ShareAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/albums/{album_id=*}:share',
                'body' => '*',
                'placeholders' => [
                    'album_id' => [
                        'getters' => [
                            'getAlbumId',
                        ],
                    ],
                ],
            ],
            'ListSharedAlbums' => [
                'method' => 'get',
                'uriTemplate' => '/v1/sharedAlbums',
            ],
        ],
    ],
];
