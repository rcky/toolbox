<?php

namespace Rcky\Tree\Node;

/**
 * Generic node interface, independent of the degree.
 * 
 * @todo add proper description for the getChildren method
 * @author Michael Rüfenacht
 */
interface NodeInterface {
     
    /**
     * Returns the wrapped value, if the object itself implements the interface
     * it returns itself.
     * 
     * @return mixed
     */
    public function getValue();

    /**
     * The Node is a leaf node!
     * @return boolean true if it has got children (false if not)
     */
    public function isLeaf();

    /**
     * Node is root as soon it has no parents.
     * @return \Rcky\Tree\NodeInterface the parent node
     */
    public function getParent();

    /**
     * Set the parent node.
     * @param \Rcky\Tree\NodeInterface $parent
     */
    public function setParent(NodeInterface $parent);
}