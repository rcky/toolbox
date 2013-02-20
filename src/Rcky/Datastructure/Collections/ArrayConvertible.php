<?php
namespace Rcky\Datastructure\Collections;

/**
 * Interface for chainable lists. Chainable means that we are allowed to nest
 * them without instantiating inner lists and provide a fluent interface for 
 * setting via the set method.
 * 
 * @author Michael Rüfenacht
 */
interface ArrayConvertible {
    
    /**
     * Return an array representation of the collection. Should be implemented
     * recursive.
     * 
     * @return array
     */
    public function toArray();
    
}