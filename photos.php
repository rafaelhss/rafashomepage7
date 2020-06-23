<?php
$path    = '/photos';
$files = array_diff(scandir(__DIR__ .$path), array('.', '..'));
foreach($files as $file) {
    echo $file, '@';
}
?>
