<?php
use ItalyStrap\Cleaner\Validation;
class ValidationTest extends \Codeception\TestCase\WPTestCase
{
    /**
     * @var \WpunitTester
     */
    protected $tester;
    
    public function setUp(): void
    {
        // Before...
        parent::setUp();

        // Your set up methods here.
    }

    public function tearDown(): void
    {
        // Your tear down methods here.

        // Then...
        parent::tearDown();
    }

	// tests
	public function testValidateIfISAnEmail()
	{
		$sut = new Validation();
		$sut->addRules( '\is_email' );

		$this->assertTrue( $sut->validate( 'test@localhost.com' ) );
	}
}
