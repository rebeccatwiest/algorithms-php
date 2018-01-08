<?php
include 'algorithms.php';

function test_unique ($in_file, $out_file){
	//read inputs
	$unique = fopen($in_file, "r") or die("Unable to open file");
	$n = fgets($unique);
	$array = array();
	while(!feof($unique)) {
  		array_push($array, fgets($unique));
	}
	fclose($unique);
	//write outputs
	$unique = fopen($out_file, "w") or die("Unable to open file");
	$output = unique($n, $array);
	//check for incorrect formatting
	
	foreach ($output as $a){
		fwrite($unique, $a);
	}
}

function test_quicksort ($in_file, $out_file){
	//read inputs
	$quicksort = fopen($in_file, "r") or die("Unable to open file");
	$n = fgets($quicksort);
	$array = array();
	while(!feof($quicksort)) {
		$temp = fgets($quicksort);
  		array_push($array, $temp);
	}
	fclose($quicksort);
	//write outputs
	$quicksort = fopen($out_file, "w") or die("Unable to open file");
	$sorted = quicksort($n, $array);
	//check for incorrect formatting
	
	foreach ($sorted as $a){
		fwrite($quicksort, $a);
	}

}

function test_tree ($in_file, $out_file){
	$tree_in = fopen($in_file, "r") or die("Unable to open file");
	$tree_out = fopen($out_file, "w") or die("Unable to open file");

	$tree = new Tree();
	while(!feof($tree_in)) {

		$operation = fgets($tree_in);

		if ($operation == -1){
			return;
		}
		else{
		$value = fgets($tree_in);
		$node = new node($value);
		}
		if ($operation == 0){
			fwrite($tree_out, $tree->delete($node));
			fwrite($tree_out, PHP_EOL);

		}
		if ($operation == 1){
			if ($tree->root == null){
				$tree->root = $node;
			}
			else{
			$tree->insert($node, $tree->root);
			}	
		}
		if ($operation == 2){
			if ($tree->root == null){
				fwrite($tree_out, 0);
				fwrite($tree_out, PHP_EOL);
			}
			else{
				fwrite($tree_out, $tree->search($node, $tree->root));
				fwrite($tree_out, PHP_EOL);

			}

		}
	}
}

function test_factorial ($in_file, $out_file){
	$factorial = fopen($in_file, "r") or die("Unable to open file");
	$n = fgets($factorial);
	fclose($factorial);
	$factorial = fopen($out_file, "w") or die("Unable to open file");
	fwrite($factorial, factorial($n));
	fwrite($factorial, PHP_EOL);
}

function test_maximum ($in_file, $out_file){
	//read inputs
	$maximum = fopen($in_file, "r") or die("Unable to open file");
	$n = fgets($maximum);
	$array = array();
	while(!feof($maximum)) {
  		array_push($array,(int) fgets($maximum));
	}
	fclose($maximum);
	//write outputs
	$maximum = fopen($out_file, "w") or die("Unable to open file");
	//check for incorrect formatting

	
		fwrite($maximum, maximum($array, $n));
		fwrite($maximum, PHP_EOL);
}

function test_BFS ($in_file, $out_file){
	$search = fopen($in_file, "r") or die("Unable to open file");
	$n = fgets($search);
	$graph = array();
	$visited = array();
	$ab = array();

	for ($i=0; $i < $n; $i ++){
		$ab[$i] = 0;
	}
	for ($i=0; $i < $n; $i ++){
		$graph[$i] = $ab;
	}

	for ($i = 0; $i <$n; $i++) {
  		$a = fgets($search);
  		$b = fgets($search);

  		$graph[$a][$b] = 1;
  		$graph[$b][$a] = 1;
	}

	$start = fgets($search);
	$goal = fgets($search);

	init ($visited, $graph);
	breadth_first($graph, $start, $visited, $goal);
}

?>