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

		$value = '<p>Test</p>';
		$expected = 'Test';

		$this->assertEquals( $expected, $sut->sanitize( 'sanitize_text_field', $value ), 'Value is not' );
	}
}
