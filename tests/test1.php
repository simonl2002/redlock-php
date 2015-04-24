<?php
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../src/RedLock.php');

$servers = [
    ["host" => '127.0.0.1', "port" => 6379, "timeout" => 2],
    ["host" => '127.0.0.1', "port" => 6389, "timeout" => 2],
    ["host" => '127.0.0.1', "port" => 6399, "timeout" => 2],
];

$redLock = new RedLock($servers);

while (true) {
    $lock = $redLock->lock('test', 10000);

    if ($lock) {
        print_r($lock);
    } else {
        print "Lock not acquired\n";
    }
}
