<?php

$output = shell_exec('/usr/local/bin/git pull origin master');
echo "<pre>$output</pre>";

?>