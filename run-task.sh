#!/bin/bash
cd $(dirname $0)
php -f cron.php
wget -q -O home.html http://itschinesetome.net/index.php

