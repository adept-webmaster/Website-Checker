# Website Checker

A simple tool to keep checking the HTTP status code of a given array of URLs.

If it is 200, then all is OK. If anything else, it is considered an error and
the administrator should check their configs server side.

The tool will keep refreshing every 10 minutes (this can be changed in the
index.js file) and only refresh the status codes, not the entire page.

It skips SSL verification so it is recommended to type the URL with the http://
prefix.

While I have tried not to use any junk frameworks, fonts and images, it does use:
* PHP
* cURL
* JavaScript
* pjax

No external stylesheets.

## Usage
1. Download and extract all of the files to whatever folder you would like.
1. Change the URLs you would like to appear in `getURLs.php` along with the
website title.
  1. If you would like to change the refresh time, do so in index.js.
1. Boot up a PHP server (the small built-in one is fine).
1. Navigate to your servers address.
1. Leave running and it will automatically refresh after the specified time
thereon.
