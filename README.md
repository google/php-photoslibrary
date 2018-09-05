# Google Photos Library API PHP Client Library Samples

This directory contains some samples to help you get started with the PHP
client library for the [Google Photos Library API](https://developers.google.com/photos).

## Get started with the samples

1. Download the source code for the sample by either cloning this repository and branch 
(for example `git clone https://github.com/google/php-photoslibrary.git -b samples`) 
or by [downloading a compressed tarball](../../blob/master/README.md#downloading-a-compressed-tarball).
1. Set up your Google Developers project, enable the Google Photos Library API,
   and create credentials for a **web application**. 
    
   See [Setting up your OAuth2 credentials](../../blob/master/README.md#Setting-up-your-OAuth2-credentials).
1. Download the OAuth configuration as a JSON file and copy it to the root of the directory with the name `client_secret.json`. 
1. Install all dependencies through composer by running `composer install`.
1. Check that your webserver fulfills [all requirements](../README.md#requirements-and-preparation),
   in particular the version of PHP and all required modules.
1. Configure your web server to serve the `src/` directory.
1. In the file `photoslibrary-sample.ini`, change the URLs where the samples are accessible. The URLs
   listed here must be included in the OAuth configuration in the developer console as 
   *Authorised redirect URIs*. 
1. Access the `albums/`, `filters/`, or `share/` directories through your web server.

## Samples
This repository includes the following samples.

### Filters
Directory: `src/filters`.
Shows how to list media, apply filters and read media metadata.

### Albums and Uploads
Directory: `src/albums`.
Shows how to list albums, list the content of albums, create new albums and
upload media.

### Sharing
Directory: `src/share`.
Shows how to share an album created by this application using `share tokens`.