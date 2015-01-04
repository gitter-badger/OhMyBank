# OhMyBank

[![Build status...](https://api.travis-ci.org/OhMyBank/OhMyBank.svg)](https://travis-ci.org/OhMyBank/OhMyBank)

OhMyBank is a web-app to track your personal finances.

## Installation

You will need [Composer](https://getcomposer.org/doc/00-intro.md#installation-nix)
to install PHP dependencies, and [NPM](https://www.npmjs.org/) + [Grunt](http://gruntjs.com/) + [Bower](http://bower.io/)
for the front-end part.

    # PHP dependencies
    composer install

    # Javascript dependencies
    npm install
    bower install

    # copy client/config/config.json.dist to client/config/config.json
    # edit api endpoint

    grunt

## Usage

    # start client server http://localhost:9000
    grunt serve

## License

OhMyBank is released under the MIT License. See the [bundled LICENSE file](LICENSE)
for details.
