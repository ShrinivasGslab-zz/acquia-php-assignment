<?php
require_once('src/class.php');

$argarray = getopt("", ["floor:", "area:"]);
$floortype = strtolower($argarray['floor']);
$area = intval($argarray['area']);


$robot = new Robot();
$robot->cleanArea($floortype, $area);

?>