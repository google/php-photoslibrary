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

require '../../vendor/autoload.php';

use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Auth\OAuth2;

session_start();
$templates = new League\Plates\Engine('../common/views');
$templates->addFolder('albums', '../albums/views');
$templates->addFolder('filters', '../filters/views');
$templates->addFolder('share', '../share/views');

$ini = parse_ini_file('../../photoslibrary-sample.ini');

/**
 * If there are no credentials, renders the $template page.
 * @param string $connectTemplate The page to render if there are no credentials, which should allow
 * the user to connect again.
 */
function checkCredentials($connectTemplate)
{
    if (!isset($_SESSION['credentials'])) {
        echo $connectTemplate;
        exit;
    }
}

/**
 * Requests access to the user's Google Photos account, and stores the resulting
 * {@link UserRefreshCredentials} object in the current session, with the key 'credentials'.
 *
 * This function handles the cases before and after the user has been redirected to grant access.
 * The calls are identical, but you must ensure that the $scopes and $redirectURI are consistent.
 *
 * When the user has successfully connected, they will be redirected to the index page.
 *
 * You should request the most restrictive scope that you can, for you user case. See
 * {@link https://developers.google.com/photos/library/guides/authentication-authorization} for more
 * details.
 *
 * The $redirectURI must be authorized for the given client secret in the Google API Console.
 *
 * You should store the refresh token for each user. See
 * {@link https://developers.google.com/identity/protocols/OAuth2WebServer} for more details.
 *
 * @param array $scopes
 * @param string $redirectURI Where the user should be directed to after granting the access
 *      request. Usually the page from where this function is called.
 */
function connectWithGooglePhotos(array $scopes, $redirectURI)
{
    $clientSecretJson = json_decode(
        file_get_contents('../../client_secret.json'),
        true
    )['web'];
    $clientId = $clientSecretJson['client_id'];
    $clientSecret = $clientSecretJson['client_secret'];

    $oauth2 = new OAuth2([
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
        'authorizationUri' => 'https://accounts.google.com/o/oauth2/v2/auth',
        // Where to return the user to if they accept your request to access their account.
        // You must authorize this URI in the Google API Console.
        'redirectUri' => $redirectURI,
        'tokenCredentialUri' => 'https://www.googleapis.com/oauth2/v4/token',
        'scope' => $scopes,
    ]);

    // The authorization URI will, upon redirecting, return a parameter called code.
    if (!isset($_GET['code'])) {
        $authenticationUrl = $oauth2->buildFullAuthorizationUri(['access_type' => 'offline']);
        header("Location: " . $authenticationUrl);
    } else {
        // With the code returned by the OAuth flow, we can retrieve the refresh token.
        $oauth2->setCode($_GET['code']);
        $authToken = $oauth2->fetchAuthToken();
        $refreshToken = $authToken['access_token'];

        // The UserRefreshCredentials will use the refresh token to 'refresh' the credentials when
        // they expire.
        $_SESSION['credentials'] = new UserRefreshCredentials(
            $scopes,
            [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'refresh_token' => $refreshToken
            ]
        );

        // Return the user to the home page.
        header("Location: index.php");
    }
}
