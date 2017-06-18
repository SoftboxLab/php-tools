<?php
$start = microtime(true);
for ($i = 0; $i < 1000; $i++) {
    $ret = glob('/dados/Projetos/*', GLOB_NOSORT | GLOB_ONLYDIR);
}
echo "\nTotal: " . (microtime(true) - $start);

print_r($ret);

$start = microtime(true);
for ($i = 0; $i < 1000; $i++) {
    $dir = opendir('/dados/Projetos/');
    $ret = [];
    while (($file = readdir($dir)) !== false) {
        if ($file != ".." && $file != "." && is_dir($file)) {
            $ret[] = $file;
        }
    }
}
//print_r($ret);
echo "\nTotal: " . (microtime(true) - $start);
