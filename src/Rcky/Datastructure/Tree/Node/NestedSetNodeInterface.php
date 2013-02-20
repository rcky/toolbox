<?php

namespace Rcky\Tree\Node;

/**
 * Interface for nodes in a nested set.
 * 
 * @author Michael Rüfenacht
 */
interface NestedSetNodeInterface {

    /**
     * Returns the right border value. Extended naming is to avoid collisions
     * with binary nodes (getLeft, getRight).
     * 
     * @return int
     */
    public function getRightBorder();

    /**
     * Returns the left border value. Extended naming is to avoid collisions
     * with binary nodes (getLeft, getRight).
     * 
     * @return int
     */
    public function getLeftBorder();
}