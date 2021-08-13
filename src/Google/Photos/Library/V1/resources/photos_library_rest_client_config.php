<?php

return [
    'interfaces' => [
        'google.photos.library.v1.PhotosLibrary' => [
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
            'BatchAddMediaItemsToAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/albums/{album_id=*}:batchAddMediaItems',
                'body' => '*',
                'placeholders' => [
                    'album_id' => [
                        'getters' => [
                            'getAlbumId',
                        ],
                    ],
                ],
            ],
            'BatchCreateMediaItems' => [
                'method' => 'post',
                'uriTemplate' => '/v1/mediaItems:batchCreate',
                'body' => '*',
            ],
            'BatchGetMediaItems' => [
                'method' => 'get',
                'uriTemplate' => '/v1/mediaItems:batchGet',
            ],
            'BatchRemoveMediaItemsFromAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/albums/{album_id=*}:batchRemoveMediaItems',
                'body' => '*',
                'placeholders' => [
                    'album_id' => [
                        'getters' => [
                            'getAlbumId',
                        ],
                    ],
                ],
            ],
            'CreateAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/albums',
                'body' => '*',
            ],
            'GetAlbum' => [
                'method' => 'get',
                'uriTemplate' => '/v1/albums/{album_id=*}',
                'placeholders' => [
                    'album_id' => [
                        'getters' => [
                            'getAlbumId',
                        ],
                    ],
                ],
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
            'GetSharedAlbum' => [
                'method' => 'get',
                'uriTemplate' => '/v1/sharedAlbums/{share_token=*}',
                'placeholders' => [
                    'share_token' => [
                        'getters' => [
                            'getShareToken',
                        ],
                    ],
                ],
            ],
            'JoinSharedAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/sharedAlbums:join',
                'body' => '*',
            ],
            'LeaveSharedAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/sharedAlbums:leave',
                'body' => '*',
            ],
            'ListAlbums' => [
                'method' => 'get',
                'uriTemplate' => '/v1/albums',
            ],
            'ListMediaItems' => [
                'method' => 'get',
                'uriTemplate' => '/v1/mediaItems',
            ],
            'ListSharedAlbums' => [
                'method' => 'get',
                'uriTemplate' => '/v1/sharedAlbums',
            ],
            'SearchMediaItems' => [
                'method' => 'post',
                'uriTemplate' => '/v1/mediaItems:search',
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
            'UnshareAlbum' => [
                'method' => 'post',
                'uriTemplate' => '/v1/albums/{album_id=*}:unshare',
                'body' => '*',
                'placeholders' => [
                    'album_id' => [
                        'getters' => [
                            'getAlbumId',
                        ],
                    ],
                ],
            ],
            'UpdateAlbum' => [
                'method' => 'patch',
                'uriTemplate' => '/v1/albums/{album.id=*}',
                'body' => 'album',
                'placeholders' => [
                    'album.id' => [
                        'getters' => [
                            'getAlbum',
                            'getId',
                        ],
                    ],
                ],
                'queryParams' => [
                    'update_mask',
                ],
            ],
            'UpdateMediaItem' => [
                'method' => 'patch',
                'uriTemplate' => '/v1/mediaItems/{media_item.id=*}',
                'body' => 'media_item',
                'placeholders' => [
                    'media_item.id' => [
                        'getters' => [
                            'getMediaItem',
                            'getId',
                        ],
                    ],
                ],
                'queryParams' => [
                    'update_mask',
                ],
            ],
        ],
    ],
];
