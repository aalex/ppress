#!/bin/bash
cd $(dirname $0)
php -f cron.php
wget -q -O index.html http://itschinesetome.net/index.php

