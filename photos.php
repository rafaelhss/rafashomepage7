<?php
$path    = '/photos';
$files = array_diff(scandir($path), array('.', '..'));
echo $files;
?>
opa
opa
<img src="/photos/pic.jpg">