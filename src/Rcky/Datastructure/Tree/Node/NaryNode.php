<?php

namespace Rcky\Tree\Node;

/**
 * Generic node implementation, independent of the degree (n-ary).
 * 
 * @todo add proper description for the getChildren method
 * @author Michael Rüfenacht
 */
class NaryNode extends Node implements NaryNodeInterface {

    protected $children;

    public function hasChildren()
    {
	return \count($this->children) !== 0;
    }

    public function getChildren()
    {
	return $this->children;
    }

    public function setChildren(\SplDoublyLinkedList $children)
    {
	$this->children = $children;
    }

    public function addChild(NodeInterface $child)
    {
	$this->getChildren()->push($child);
    }

    public function removeChild(NodeInterface $child)
    {
	//$this->getChildren()->
    }
}