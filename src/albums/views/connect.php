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

$this->layout('connect', ['sampleTitle' => 'Albums: read, add + create', 'iconPath' => '../common/album.svg'])
?>

<li>Connecting to a Google Photos account</li>
<li>Requesting scopes from a Google Photos user</li>
<li>Reading the album list (including shared albums)</li>
<li>Creating an album</li>
<li>Adding media to an album</li>