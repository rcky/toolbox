<?php
namespace Rcky\Datastructure\Collections;

/**
 * Interface for chainable lists. Chainable means that we are allowed to nest
 * them without instantiating inner lists and provide a fluent interface for 
 * setting via the set method.
 * 
 * @author Michael Rüfenacht
 */
interface ChainableArrayAccess extends \ArrayAccess {
    
    /**
     * Return an empty representation of the actual list. This one gets used
     * by the null entry. To nest a correct type of collection
     * 
     * @return Rcky\Datastructure\Collections\ChainableArrayAccess
     */
    public function getEmptyInstance();
    
    /**
     * Setter for fluent setting of values.
     * 
     * @return Rcky\Datastructure\Collections\ChainableArrayAccess
     */
    public function set($offset, $value);
}