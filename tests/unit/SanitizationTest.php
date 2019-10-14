<?php

use ItalyStrap\Cleaner\Sanitization;

class SanitizationTest extends \Codeception\Test\Unit
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
    public function testReturnStrippedStringWithNoRules()
    {
		$sut = new Sanitization();

		$value = '<p>Test</p>';
		$expected = 'Test';

		$this->assertEquals( $expected, $sut->sanitize( '', $value ), 'Value is not' );
    }

    // tests
    public function testReturnStrippedStringIfCallbackIsNotExiting()
    {
		$sut = new Sanitization();

		$value = '<p>Test</p>';
		$expected = 'Test';

		$this->assertEquals( $expected, $sut->sanitize( 'callbackNotExisting', $value ), 'Value is not' );
    }

    // tests
    public function testReturnStrippedString()
    {
		$sut = new Sanitization();

		$value = '<p>Test</p>';
		$expected = 'Test';

		$this->assertEquals( $expected, $sut->sanitize( 'strip_tags', $value ), 'Value is not' );
    }

    // tests
    public function testReturnStrippedAndTrimmedString()
    {
		$sut = new Sanitization();

		$value = ' <p> Test </p> ';
		$expected = 'Test';

		$this->assertEquals( $expected, $sut->sanitize( 'strip_tags|trim', $value ), 'Value is not' );
    }

    // tests
    public function testReturnStringNumber()
    {
		$sut = new Sanitization();

		$value = 1;
		$expected = '1';

		$this->assertEquals( $expected, $sut->sanitize( 'absint', $value ), 'Value is not' );
    }
}