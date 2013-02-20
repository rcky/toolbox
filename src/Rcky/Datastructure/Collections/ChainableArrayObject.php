<?php
namespace Rcky\Datastructure\Collections;

/**
 * Basic implementation of a chainable array access
 *
 * @author Michael Rüfenacht
 */
class ChainableArrayObject extends \ArrayObject implements ChainableArrayAccess, ArrayConvertible {

    public function offsetGet($index)
    {
	if ($this->offsetExists($index)) {
	    return parent::offsetGet($index);
	}
	return new NullEntry($this, $index);
    }

    protected function makeArray($object)
    {
	$result = array();
	foreach ($object as $key => $entry) {
	    if ($entry instanceof \Traversable || \is_array($entry)) {
		$result[$key] = $this->makeArray($entry);
	    } else {
		$result[$key] = $entry;
	    }
	}
	return $result;
    }

    public function toArray()
    {
	return $this->makeArray($this);
    }

    public function getEmptyInstance()
    {
	return new static();
    }

    public function set($offset, $value)
    {
	$this->offsetSet($offset, $value);
	return $this;
    }

}