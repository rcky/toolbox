<?php
namespace Rcky\Datastructure\Collections;

/**
 * A null entry if a position in a chainable array object misses:
 * 
 * @see ChainableArrayObject
 * @author Michael Rüfenacht
 */
class NullEntry implements ChainableArrayAccess {
    
    /**
     * The called representation.
     * @var Rcky\Datastructure\Collections\ChainableArrayAccess
     */
    protected $target;
    
    /**
     * The key the entry was missing.
     * @var mixed
     */
    protected $key;
    /**
     * Inner storage, analogous to the arrayobject implementation
     * @var array
     */
    protected $storage;

    public function __construct(ChainableArrayAccess $target, $key)
    {
	$this->target	= $target;
	$this->key	= $key;
	$this->storage	= array();
    }
    
    # this object never has a valid index
    public function offsetGet($index)
    {
	return new static($this, $index);
    }

    public function offsetSet($index, $value)
    {
	$ao = $this->target->getEmptyInstance();
	$ao[$index] = $value;
	$this->target->offsetSet($this->key, $ao);
    }

    public function offsetUnset($offset)
    {
	throw new \BadMethodCallException("No method call on a Null object");
    }

    public function getEmptyInstance()
    {
	return $this->target->getEmptyInstance();
    }
    
    public function set($offset, $value)
    {
	throw new \BadMethodCallException("No method call on a Null object");
    }
        
    public function __call($name, $args)
    {
	throw new \BadMethodCallException("No method call on a Null object");
    }

    public function offsetExists($offset)
    {
	throw new \BadMethodCallException("No method call on a Null object");
    }

}