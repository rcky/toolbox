<?php

use Rcky\Datastructure\Collections\ChainableArrayObject;

class ChainableArrayObjectTest extends \PHPUnit_Framework_TestCase 
{

    const   CHAINABLE_CLASS	= 'Rcky\Datastructure\Collections\ChainableArrayObject',
	    NULL_ENTRY_CLASS	= 'Rcky\Datastructure\Collections\NullEntry';
    /**
     * @var \Rcky\Datastructure\Collections\ChainableArrayObject
     */
    protected $chainable;

    public function setUp()
    {
	$this->chainable = new ChainableArrayObject();
    }

    public function testSetup()
    {
	$this->assertCount(0, $this->chainable);
    }

    public function testGetEmptyInstance()
    {
	$empty = $this->chainable->getEmptyInstance();
	$this->assertCount(0, $empty);
	$this->assertInstanceOf(self::CHAINABLE_CLASS, $empty);
    }
    
    public function testSet()
    {
	$return = $this->chainable->set('test', false);
	
	$this->assertInstanceOf(self::CHAINABLE_CLASS, $return);
	$this->assertCount(1, $this->chainable);
	
	$this->chainable->set('untest', 10);
	$this->assertCount(2, $this->chainable);
    }
    
    public function testToArray()
    {
	$other = $this->chainable->getEmptyInstance();
	$other->offsetSet(0, true);
	$other->offsetSet(1, new stdClass());
	
	$this->chainable->offsetSet(1, 20);
	$this->chainable->offsetSet(2, array(1,2,3));
	$this->chainable->offsetSet(3, array(1, $other));
	
	$array = $this->chainable->toArray();
	# assert the length of the outer object
	$this->assertCount(3, $array);
	# assert that the stdClass of the inner object was preserved
	$this->assertInstanceOf('stdClass', $array[3][1][1]);
	# assert that the inner object was also converted to an array
	$this->assertTrue(\is_array($array[3][1]));
	# assert that all elements are included (inner arrays included!!)
	$this->assertEquals(\count($array, COUNT_RECURSIVE), 10);
    }
    
    public function testChaining()
    {
	# usually you should never use the chainables like that
	$nullEntry  = $this->chainable['undefined_index'];
	$nullEntry2 = $this->chainable['another_undefined_index']['with_a_unknown_inner'];
	
	$this->assertInstanceOf(self::NULL_ENTRY_CLASS, $nullEntry);
	$this->assertCount(0, $this->chainable);
	$this->assertInstanceOf(self::NULL_ENTRY_CLASS, $nullEntry2);
	$this->assertCount(0, $this->chainable);
	
	$nullEntry['back_to_its_target'] = true;
	$this->assertCount(1, $this->chainable);
	$this->assertTrue($this->chainable['undefined_index']['back_to_its_target']);
	#the inner iterator now should be the same as its outer
	$this->assertInstanceOf(self::CHAINABLE_CLASS, $this->chainable['undefined_index']);
	
	$nullEntry2['and_a_defined_one'] = 'defined boy';
	$this->assertCount(2, $this->chainable);
	$this->assertEquals('defined boy', $this->chainable['another_undefined_index']['with_a_unknown_inner']['and_a_defined_one']);
    }
}