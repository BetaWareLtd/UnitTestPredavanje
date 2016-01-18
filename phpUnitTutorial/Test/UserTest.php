<?php

namespace phpUnitTutorial\Test;

use phpUnitTutorial\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
	public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet()
	{
	    $details=array();

	    $user=new User($details);

	    $pass='yuhuu';

	    $rizalt=$user->setPassword($pass);

	    $this->assertTrue($rizalt);
	}
	public function testGetUserReturnsUserWithExpectedValues()
	{
	    $details=array();

	    $user=new User($details);

	    $pass='yuhuu';

	    $rizalt=$user->setPassword($pass);

	    $expectedPass=md5($pass);

	    $currentUser=$user->getUser();

	    $this->assertEquals($expectedPass, $currentUser['password']);
	}
	public function testSetPasswordReturnsFalseWhenPasswordLengthIsTooShort()
	{
	    $details = array();

	    $user = new User($details);

	    $password = 'fub';

	    $result = $user->setPassword($password);

	    $this->assertFalse($result);
	}
}