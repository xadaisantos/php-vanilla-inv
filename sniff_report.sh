#!/bin/bash

vendor/bin/phpcs --colors --standard=PSR2 --report=summary $1
