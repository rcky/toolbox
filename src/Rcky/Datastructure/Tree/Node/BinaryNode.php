<?php

namespace Rcky\Tree\Node;

/**
 * Basic binary node implementation. Basically its better to avoid that,
 * since spl provides a solid and fast heap implementation.
 * 
 * @author Michael Rüfenacht
 */
class BinaryNode extends Node implements BinaryNodeInterface {
    
    protected $left;
    protected $right;
    
    public function getLeft()
    {
	return $this->left;
    }

    public function getRight()
    {
	return $this->right;
    }

    public function isLeaf()
    {
	return !($this->getLeft() && $this->getRight());
    }

    public function setLeft(BinaryNodeInterface $left)
    {
	$this->left = $left;
    }

    public function setRight(BinaryNodeInterface $right)
    {
	$this->right = $right;
    }
}