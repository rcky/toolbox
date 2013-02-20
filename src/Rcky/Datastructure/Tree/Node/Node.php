<?php

namespace Rcky\Tree\Node;

/**
 * Abstract implementation of a node.
 *
 * @author Michael Rüfenacht
 */
abstract class Node implements NodeInterface {
    
    protected $parent;
    protected $value;
    
    public function __construct($value, $parent = null)
    {
	$this->value	= $value;
	$this->parent	= $parent;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
	return $this->parent;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
	return $this->value;
    }
    
    /**
     * {@inheritdoc}
     */
    abstract public function isLeaf();

    /**
     * {@inheritdoc}
     */
    public function setParent(NodeInterface $parent)
    {
	$this->parent = $parent;
    }
}