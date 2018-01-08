<?php
include 'test-functions.php';

//TEST UNIQUE

//given input file
test_unique("intList1000.txt", "unique1000-out.txt");

//TEST QUICKSORT

//given inputs
test_quicksort("intList1000.txt", "quicksort1000-out.txt");

//TEST BST
test_tree("bst1000.txt", "bst1000-out.txt");

//TEST FACTORIAL
test_factorial("factorial10.txt", "factorial10-out.txt");

//TEST MAXIMUM
test_maximum("intList1000.txt", "max1000-out.txt");

//TEST BFS
//test_BFS("breadth-first-search-in.txt", "breadth-first-search-out.txt");


?>