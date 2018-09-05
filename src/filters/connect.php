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

require '../common/common.php';

// This app only reads from the user's library, so the scopes to write data are not required.
// photoslibrary.readonly is sufficient.
connectWithGooglePhotos(
    ['https://www.googleapis.com/auth/photoslibrary.readonly'],
    $ini['filters_authentication_redirect_url']
);
