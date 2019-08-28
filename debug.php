<?php
$site = "http://www.w3school.com.cn/";
fopen($site,"r")
or exit("Unable to connect to $site");
var_dump($site);
$a = array ('a' => 'apple',
    'b' => 'banana',
    'c' => array ('x','y','z'));
print_r ($a);