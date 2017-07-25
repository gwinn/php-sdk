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
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Tests\Methods\Version5;

use Ecomlogic\Test\TestCase;

/**
 * Class ApiClientMarketplaceTest
 *
 * @package Ecomlogic\Tests
 */
class ApiClientMarketplaceTest extends TestCase
{
    const SNAME = 'Marketplace integration v5';
    const SCODE = 'integration_v5';

    /**
     * @group marketplace_v5
     */
    public function testConfigurationEdit()
    {
        $client = static::getApiClient(null, null, "v5");

        $response = $client->request->marketplaceSettingsEdit(
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
