<?php

require "LinkedList.php";
require "Node.php";

use Jair\LinkedList;

$list = new LinkedList();

$list->push(2);
$list->push('q');
$list->push('Jair');

echo $list;

$list->push(5);

echo $list->getItem(3);