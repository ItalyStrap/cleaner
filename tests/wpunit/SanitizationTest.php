<?php
use ItalyStrap\Cleaner\Sanitization;
class SanitizationTest extends \Codeception\TestCase\WPTestCase
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
	public function testReturnStrippedString()
	{
		$sut = new Sanitization();
		$sut->addRules( 'sanitize_text_field' );

		$value = '<p>Test</p>';
		$expected = 'Test';

		$this->assertEquals( $expected, $sut->sanitize( $value ), 'Value is not' );
	}
}
