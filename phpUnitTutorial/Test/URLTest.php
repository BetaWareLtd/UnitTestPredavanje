<?php

namespace phpUnitTutorial\Test;
use phpUnitTutorial\URL;

class URLTest extends \PHPUnit_Framework_TestCase
{
	/**
	 *@dataProvider providerTestSlugiffyReturnsSluggifiedString
	 */	
    public function testSlugiffyReturnsSluggifiedString($originalString, $expectedResult){

    	$url=new URL();
    	$res=$url->sluggify($originalString);

    	$this->assertEquals($expectedResult, $res);
    }

    public function providerTestSlugiffyReturnsSluggifiedString(){
    	return array(
    			array('This string', 'this-string'),
    			array('This1 string2', 'this1-string2'),
    		);
    }
  
}
