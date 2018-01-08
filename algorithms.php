<?php

//UNIQUE
function unique($n, $inputs) {
  $array = array();
  $outputs = array();
		foreach ($inputs as $a){
      if (!(in_array($a, $outputs))){
        array_push($outputs, $a);
      }
  }
  return $outputs;
}

//QUICKSORT
function quicksort ($n, $inputs){
	if (count($inputs) <= 1){
		return $inputs;
	}
	else{
		$pivot = $inputs[0];
		$left = array();
		$right = array();
		for ($i = 1; $i < count($inputs); $i++){
			if ((int) $inputs[$i] < $pivot){
				array_push($left, $inputs[$i]);
			}
			else{
				array_push($right, $inputs[$i]);
			}
		}
	}
	return array_merge(quicksort($n, $left), array($pivot), quicksort($n, $right));
}

//Binary Search Tree
class Node {
	public $parent = null;
	public $left = null;
	public $right = null;
	public $value = null;

	function Node ($v){
		$this->value = $v;
	}

 function remove($val, Node $parent) {
        if ($this->value > $val) {
              if ($this->left != null){
                    return $this->left->remove($val, $this);
                }
              else{
                    return 0;
                }
        }
        if ($val > $this->value) {
              if ($this->right != null){
                    return $this->right->remove($val, $this);}
              else{
                    return 0;}
        } else {
              if ($this->left != null && $this->right != null) {
                    $this->value = $this->right->minValue();
                    $this->right->remove($this->value, $this);
              } if ($parent->left === $this) {
                    $parent->left = ($this->left != null) ? $this->left : $this->right;
              } if ($parent->right === $this) {
                    $parent->right = ($this->left != null) ? $this->left : $this->right;
              }
              return 1;
        }
  }
  function minValue() {
            if ($this->left == null)
                  return $this->value;
            else
                  return $this->left->minValue();
      }
}

class Tree {
	public $root = null;

	function insert($insert, $node){
		
			if ($insert->value <= $node->value) {
			if ($node->left == null) {
				$node->left = $insert;
				$insert->parent = $node;
			} else {
				$this->insert($insert, $node->left);
			}
		}
		else {
			if ($node->right == null) {
				$node->right = $insert;
				$insert->parent = $node;
			} else {
				$this->insert($insert, $node->right);
			}
		}		
	}

	function search($target,  $node){
		
		if ($target->value == $node->value) {
			return 1;
		} 
		if ($target->value > $node->value && $node->right != null) {
			return $this->search($target, $node->right);
		} 
		if ($target->value <= $node->value && $node->left != null) {
			return $this->search($target, $node->left);
		}
		return 0;
	}
	function delete($node) {
            if ($this->root == null){
                  return 0;}
            if ($this->search($node, $this->root) == 0){
                  return 0;}
            else {
                  if ($this->root == $node) {
                         $temp = new Node(0);
                        $temp->left = $this->root;
                        $result = $this->root->remove($node->value, $temp);
                        $this->root = $temp->left;
                        return $result;
                  } else {
                  		$n = new Node(null);
                        return $this->root->remove($node->value, $n);
                  }
            }
      }
}

// calculates factorial
function factorial($n){
	if($n < 0){
		return 0;
	}
	elseif($n == 1){
		return 1;
	}
	else{
		return $n * factorial($n-1);
	}

}

//Maximum
function maximum($array, $n){
	$max= $array[0];
	for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] > $max){
        	$max = $array[$i];
        }
      }
        	return $max;
    }

//BFS
function init($visited, $graph) 
{
    foreach ($graph as $key => $vertex) {
        $visited[$key] = 0;
    }
}
function breadth_first(&$graph, $start, $visited, $goal)
{
    $queue = array();
 
    array_push($queue, $start);
    $visited[$start] = 1;
    echo $start . "\n";
 
    while (count($queue)) {
        $temp = array_shift($queue);
 
        foreach ($graph[$temp] as $key => $vertex) {
            if ($visited[$key] == 0) {
                $visited[$key] = 1;
                array_push($queue, $key);
                echo $key . "\t";
                if ($temp == $goal){
                	return;
                }
            }
        }
    }
} 
?>
