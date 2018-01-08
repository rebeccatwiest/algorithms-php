<?php
include 'algorithms.Tree.php';

echo 'hello';
$a = 1;
$tree = new Tree();
$root = new Node(9);
$six = new Node(6);
$ten = new Node(10);
$three = new Node(3);
$seven = new Node(7);
$tree->insert($six);
$tree->insert($ten);
$tree->insert($three);
$tree->insert($seven);

?>