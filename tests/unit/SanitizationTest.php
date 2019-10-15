<?php

use ItalyStrap\Cleaner\IncorrectRuleTypeException;
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
    public function testThrownRuntimeExceptionIfNoRulesAreProvided()
    {
		$sut = new Sanitization();

		$this->expectException( '\ItalyStrap\Cleaner\Exceptions\NoRuleWasProvidedException' );
		$sut->sanitize( 'Value' );
    }

	// tests
    public function testThrownInvalidArgumentExceptionIfIncorrectRuleType()
    {
		$sut = new Sanitization();
		$this->expectException( '\ItalyStrap\Cleaner\Exceptions\IncorrectRuleTypeException' );

		$sut->addRules( 1 );
    }

    // tests
    public function testThrownInvalidArgumentExceptionIfCallbackIsNotExiting()
    {
		$sut = new Sanitization();
		$this->expectException( '\ItalyStrap\Cleaner\Exceptions\CallableNotResolvableException' );

		$sut->addRules('callbackNotExisting');
		$sut->sanitize( 'Value' );
    }

    // tests
    public function testReturnStrippedString()
    {
		$sut = new Sanitization();
		$sut->addRules( 'strip_tags' );

		$value = '<p>Test</p>';
		$expected = 'Test';

		$this->assertEquals( $expected, $sut->sanitize( $value ), 'Value is not as expected' );
    }

    // tests
    public function testReturnStrippedAndTrimmedString()
    {
		$sut = new Sanitization();
		$sut->addRules( 'strip_tags|trim' );

		$value = ' <p> Test </p> ';
		$expected = 'Test';

		$this->assertEquals( $expected, $sut->sanitize( $value ), 'Value is not as expected' );
    }

    // tests
    public function testReturnNumber()
    {
		$sut = new Sanitization();
		$sut->addRules( 'intval' );

		$value = 1;
		$expected = 1;

		$this->assertEquals( $expected, $sut->sanitize( $value ), 'Value is not as expected' );
    }

    // tests
    public function testReturnFloat()
    {
		$sut = new Sanitization();
		$sut->addRules( 'floatval' );

		$value = 1.1;
		$expected = 1.1;

		$this->assertEquals( $expected, $sut->sanitize( $value ), 'Value is not as expected' );
    }

    // tests
    public function testReturnValueFromCallable()
    {

		$value = 1.1;
		$expected = 'New value from callback';

		$callback = function ( $value ) use ( $expected ) {
			return  $expected;
		};

		$sut = new Sanitization();
		$sut->addRules( [ $callback ] );

		$this->assertEquals( $expected, $sut->sanitize( $value ), 'Value is not as expected' );
    }

    // tests
    public function testReturnValueTrimmedFromCallable()
    {

		$value = 1.1;
		$expected = 'New value from callback';

		$callback = function ( $value ) use ( $expected ) {
			/**
			 * '  New value from callback  '
			 */
			return '  ' . $expected . '  ';
		};

		$sut = new Sanitization();
		$sut->addRules( [ $callback ] );
		$sut->addRules( 'trim' );

		$this->assertEquals( $expected, $sut->sanitize( $value ), 'Value is not as expected' );
    }
}