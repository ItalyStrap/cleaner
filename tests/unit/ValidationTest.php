<?php
use ItalyStrap\Cleaner\Validation;
class ValidationTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

	// tests
	public function testValidateString()
	{
		$sut = new Validation();
		$sut->addRules( 'is_string' );

		$this->assertTrue( $sut->validate( 'test@localhost.com' ) );
	}

	// tests
	public function testValidateInteger()
	{
		$sut = new Validation();
		$sut->addRules( 'is_int' );

		$this->assertTrue( $sut->validate( 1 ) );
	}
}