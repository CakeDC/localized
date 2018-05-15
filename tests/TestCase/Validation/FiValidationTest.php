<?php
/**
 * Finnish Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Cake\Localized\Test\TestCase\Validation;

use Cake\Localized\Validation\FiValidation;
use Cake\TestSuite\TestCase;

/**
 * FiValidationTest
 *
 */
class FiValidationTest extends TestCase
{

    /**
     * Person id data provider
     *
     * @return array
     */
    public function personIdProvider()
    {
        return [
            ['120553-128K', true],
            ['010100+991D', true],
            ['010100-9857', true],
            ['010100A929D', true],
            ['010100+991B', false],
            ['010100-9856', false],
            ['010100A929B', false],
            [null, false],
            ['', false],
        ];
    }

    /**
     * Postal data provider
     *
     * @return array
     */
    public function postalProvider()
    {
        return [
            ['00000', true],
            ['000000', false],
            ['99999', true],
            ['9999A', false],
            ['1234', false],
        ];
    }

    /**
     * @return array
     */
    public function businessIdProvider()
    {
        return [
            ['16067584', true],
            ['1606758-4', true],
            ['1234567', false],
            ['', false],
        ];
    }

    /**
     * @return array
     */
    public function referenceNumberPrefixedProvider()
    {
        return [
            ['RF6110032', true],
            ['RF6110031', false],
            ['RF0810016', true],
            ['RF0810017', false],
        ];
    }

    /**
     * @return array
     */
    public function referenceNumberNumericProvider()
    {
        return [
            ['00001234561', true],
            ['1234561', true],
            ['1234562', false],
        ];
    }

    /**
     * Test Finnish person id
     *
     * @dataProvider personIdProvider
     *
     * @param $item   string Person id to check
     * @param $assert bool Asserted validation result
     *
     * @return void
     */
    public function testPersonId($item, $assert)
    {
        $this->assertEquals($assert, FiValidation::personId($item));
    }

    /**
     * Test Finnish postal
     *
     * @dataProvider postalProvider
     *
     * @param $item   string Postal to check
     * @param $assert bool Asserted validation result
     *
     * @return void
     */
    public function testPostal($item, $assert)
    {
        $this->assertEquals($assert, FiValidation::postal($item));
    }


    /**
     * Test finnish business ids
     *
     * @dataProvider businessIdProvider
     *
     * @param $item
     * @param $assert
     *
     * @return void
     */
    public function testBusinessIds($item, $assert)
    {
        $this->assertEquals($assert, FiValidation::businessId($item));
    }


    /**
     * Test finnish prefixed reference numbers
     *
     * @dataProvider referenceNumberPrefixedProvider
     *
     * @param $assert
     * @param $item
     *
     * @return void
     */
    public function testReferenceNumberPrefixed($item, $assert)
    {
        $this->assertEquals($assert, FiValidation::referenceNumberPrefixed($item));
    }

    /**
     * Test finnish numeric reference numbers
     *
     * @dataProvider referenceNumberNumericProvider
     *
     * @param $assert
     * @param $item
     *
     * @return void
     */
    public function testReferenceNumberNumeric($item, $assert)
    {
        $this->assertEquals($assert, FiValidation::referenceNumberNumeric($item));
    }

}
