<?php

use Rcky\Datastructure\Collections\ChainableArrayObject,
	Rcky\Datastructure\Collections\NullEntry;

class NullEntryTest extends \PHPUnit_Framework_TestCase 
{

    const   CHAINABLE_CLASS	= 'Rcky\Datastructure\Collections\ChainableArrayObject',
	    NULL_ENTRY_CLASS	= 'Rcky\Datastructure\Collections\NullEntry';
    /**
     * @var \Rcky\Datastructure\Collections\ChainableArrayObject
     */
    protected $chainable;
    /**
     * @var \Rcky\Datastructure\Collections\NullEntry
     */
    protected $nullEntry;
    /**
     * @var \Rcky\Datastructure\Collections\NullEntry
     */
    protected $generatedNullEntry;
    /**
     * @var string
     */
    protected $key = 'someTestkey';
	    
    public function setUp()
    {
	$this->chainable = new ChainableArrayObject();
	$this->nullEntry = new NullEntry($this->chainable, $this->key);
    }

    public function testGetUndefinedIndex()
    {
	$nestedNullEntry = $this->nullEntry->offsetGet('undefined');
	$this->assertInstanceOf(self::NULL_ENTRY_CLASS, $nestedNullEntry);
    }
    
    public function testSetIndex()
    {
	$value = 5555;
	$this->nullEntry[0]=$value;
	
	$this->assertCount(1, $this->chainable);
	$this->assertTrue($this->chainable->offsetExists($this->key));
	$this->assertEquals($value, $this->chainable[$this->key][0]);
    }
    /**
     * @expectedException \BadMethodCallException
     */
    public function testNullEntryMethodCall()
    {
	$this->nullEntry->someMethod();
    }
    /**
     * @expectedException \BadMethodCallException
     */
    public function testNullEntryOffsetUnset()
    {
	$this->nullEntry->offsetUnset('some_offset');
    }
    /**
     * @expectedException \BadMethodCallException
     */
    public function testNullEntrySet()
    {
	$this->nullEntry->set('one', true);
    }
    /**
     * @expectedException \BadMethodCallException
     */
    public function testOffsetExists()
    {
	$this->nullEntry->offsetExists('try');
    }
    
    public function testGetEmptyInstance()
    {
	$this->assertInstanceOf(self::CHAINABLE_CLASS, $this->nullEntry->getEmptyInstance());
	$this->assertCount(0, $this->nullEntry->getEmptyInstance());
    }
}