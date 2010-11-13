
 ____  _      _                    ____                    
|  _ \(_) ___| |_ _   _ _ __ ___  |  _ \ _ __ ___  ___ ___ 
| |_) | |/ __| __| | | | '__/ _ \ | |_) | '__/ _ \/ __/ __|
|  __/| | (__| |_| |_| | | |  __/ |  __/| | |  __/\__ \__ \
|_|   |_|\___|\__|\__,_|_|  \___| |_|   |_|  \___||___/___/
                                                           

This project contains the Web front-end to the Picture Press project, by Ellen Tang. 
The following license terms are for this code only:

ppress

Copyright (C) 2010 Ellen Tang <hello@ellentang.com>
Copyright (C) 2010 Alexandre Quessy <alexandre@quessy.net>

ppress is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

ppress is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the gnu general public license
along with ppress.  If not, see <http://www.gnu.org/licenses/>.

Some technical info
-------------------

Go to http://itschinesetome.net/index.php to see the results of your changes in the PHP code. Actually, the PHP code is the index.php page. That's where the code runs the MySQL queries and prints the results. Every hour, it's saved as a page called index.html, which is a static version of it. It's done in a periodic task. To change that task, edit the "run-task.sh" file. This file is run every hour by a cron job. Use "crontab -e" to edit the cron job. Here is how it looks:

# m h  dom mon dow   command
0 * * * *  ~/public_html/run-task.sh

The navigation uses Javascript. There is only one HTML (PHP) page, and there are anchors which toggle which section is visible. There can only be one section that has the "toggle" class attribute visible at a time. (search for "toggle" in the files in the tpl directory) HTML links used to show such a section must have the "magiclink" class attribute and point to an anchor with the class of the section to show. (those sections must have at least two classes) Those are CSS classes.

<a class="magiclink" href="#blog>Go to blog</a>
<div class="toggle blog">Bla bla</div>


To look at the log, do this:

tail -F public_html/logging-cron-output.log
