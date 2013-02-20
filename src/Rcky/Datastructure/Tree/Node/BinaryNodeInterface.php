<?php

namespace Rcky\Tree\Node;

/**
 * Generic node interface, for binary trees. Basically its better to avoid that,
 * since spl provides a solid and fast heap implementation.
 * 
 * @author Michael Rüfenacht
 */
interface BinaryNodeInterface {

    /**
     * Returns the left child
     * @return \Rcky\Tree\Node\BinaryNodeInterface
     */
    public function getLeft();

    /**
     * Returns the right child
     * @return \Rcky\Tree\Node\BinaryNodeInterface
     */
    public function getRight();

    /**
     * @param \Rcky\Tree\Node\BinaryNodeInterface $left
     */
    public function setLeft(BinaryNodeInterface $left);

    /**
     * @param \Rcky\Tree\Node\BinaryNodeInterface $right
     */
    public function setRight(BinaryNodeInterface $left);
}