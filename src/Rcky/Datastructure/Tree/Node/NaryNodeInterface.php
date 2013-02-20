<?php

namespace Rcky\Tree\Node;

/**
 * Generic node interface, independent of the degree (n-ary).
 * 
 * @todo add proper description for the getChildren method
 * @author Michael Rüfenacht
 */
interface NaryNodeInterface {

    /**
     * @return bool
     */
    public function hasChildren();

    /**
     * @return \SplDoublyLinkedList the children
     */
    public function getChildren();

    /**
     * Sets the internal collection of children.
     */
    public function setChildren(\SplDoublyLinkedList $children);

    /**
     * Pushes a new node to the internal children collection.
     */
    public function addChild(NodeInterface $child);

    /**
     * Removes the node from the child
     * @param \Rcky\Tree\NodeInterface $child
     */
    public function removeChild(NodeInterface $child);
}