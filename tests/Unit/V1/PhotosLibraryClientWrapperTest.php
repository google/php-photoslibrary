<?php
/*
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

namespace Google\Photos\Library\Tests\Unit\V1;

use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Photos\Library\V1\PhotosLibraryClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Unit tests for {@link PhotosLibraryClient}, in addition to those in
 * {@link PhotosLibraryClientTest}, which only tests {@link PhotosLibraryGapicClient}. This set of
 * tests exercises the behavior of PhotosLibraryClient that is not inherited from
 * PhotosLibraryGapicClient.
 *
 * Extends GeneratedTest for access to assertProtobufEquals.
 */
class PhotosLibraryClientWrapperTest extends GeneratedTest
{
    /**
     * Photos library client instance.
     *
     * @var \Google\Photos\Library\V1\PhotosLibraryClient
     */
    private $photosLibraryClient;

    /**
     * Guzzle mocked http handler.
     *
     * @var \GuzzleHttp\Handler\MockHandler
     */
    private $mockHttpHandler;

    /**
     * Mocked credentials handler.
     *
     * @var \Google\ApiCore\CredentialsWrapper|\PHPUnit_Framework_MockObject_MockObject
     */
    private $mockCredentialsHandler;

    /**
     * Mock transport testing from Google API core.
     *
     * @var \Google\ApiCore\Testing\MockTransport
     */
    private $mockTransport;

    /**
     * Set up function for the test class.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    protected function setUp()
    {
        $this->mockCredentialsHandler = $this->getMockBuilder(CredentialsWrapper::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockTransport = new MockTransport();
        $this->mockHttpHandler = new MockHandler();

        $options = [
            'credentials' => $this->mockCredentialsHandler,
            'transport' => $this->mockTransport,
            'httpClient' => new Client(['handler' => HandlerStack::create($this->mockHttpHandler)])
        ];

        $this->photosLibraryClient = new PhotosLibraryClient($options);
    }

    /**
     * Upload testing.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testUpload()
    {
        $this->mockHttpHandler->append(new Response(200, [], "upload token"));
        $this->mockCredentialsHandler->method('getBearerString')->willReturn('bearer string');

        $response = $this->photosLibraryClient->upload("some bytes", "my_file.png");
        $this->assertSame($response, "upload token");

        $request = $this->mockHttpHandler->getLastRequest();
        $this->assertSame("application/octet-stream", $request->getHeaderLine('Content-type'));
        $this->assertSame("my_file.png", $request->getHeaderLine('X-Goog-Upload-File-Name'));
        $this->assertSame("bearer string", $request->getHeaderLine('Authorization'));
        $this->assertSame("some bytes", (string) $request->getBody());
    }
}
