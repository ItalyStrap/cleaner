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
	public function testValidateIfISAString()
	{
		$sut = new Validation();

		$this->assertTrue( $sut->validate( 'is_string', 'test@localhost.com' ) );
	}
}