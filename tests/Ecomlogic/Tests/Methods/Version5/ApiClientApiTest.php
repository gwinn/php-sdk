<?php

/**
 * PHP version 5.4
 *
 * API client api test class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Tests\Methods\Version5;

use Ecomlogic\Test\TestCase;
use Ecomlogic\ApiClient;

/**
 * Class ApiClientApiTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientApiTest extends TestCase
{
    /**
     * Test credential method
     *
     * @group api_v5
     *
     * @return void
     */
    public function testCredential()
    {
        $configUrl = getenv('ECOMLOGIC_URL') ?: $_SERVER['ECOMLOGIC_URL'];
        $configKey = getenv('ECOMLOGIC_KEY') ?: $_SERVER['ECOMLOGIC_KEY'];

        $client = new ApiClient($configUrl, $configKey, null, null);

        $response = $client->request->apiCredentials();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }

    /**
     * Test version method
     *
     * @group api_v5
     *
     * @return void
     */
    public function testVersion()
    {
        $configUrl = getenv('ECOMLOGIC_URL') ?: $_SERVER['ECOMLOGIC_URL'];
        $configKey = getenv('ECOMLOGIC_KEY') ?: $_SERVER['ECOMLOGIC_KEY'];

        $client = new ApiClient($configUrl, $configKey, null, null);

        $response = $client->request->apiVersions();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }
}
