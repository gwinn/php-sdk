<?php

/**
 * PHP version 5.4
 *
 * API client marketplace test class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Tests;

use Ecomlogic\Test\TestCase;

/**
 * Class ApiClientMarketplaceTest
 *
 * @package Ecomlogic\Tests
 */
class ApiClientMarketplaceTest extends TestCase
{
    const SNAME = 'Marketplace dev';
    const SCODE = 'dev';

    /**
     * @group marketplace
     */
    public function testConfigurationEdit()
    {
        $client = static::getApiClient();

        $response = $client->marketplaceSettingsEdit(
            [
                'name' => self::SNAME,
                'code' => self::SCODE,
                'logo' => 'http://download.retailcrm.pro/logos/setup.svg',
                'active' => 'true'
            ]
        );

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }
}
