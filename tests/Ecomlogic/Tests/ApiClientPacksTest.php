<?php

/**
 * PHP version 5.4
 *
 * API client packs test class
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
 * Class ApiClientPacksTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientPacksTest extends TestCase
{
    /**
     * Test packs history
     *
     * @group  packs
     * @return void
     */
    public function testPacksHistory()
    {
        $client = static::getApiClient();

        $response = $client->ordersPacksHistory();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->success);
        static::assertTrue(
            isset($response['history']),
            'API returns orders assembly history'
        );
        static::assertTrue(
            isset($response['generatedAt']),
            'API returns generatedAt in orders assembly history'
        );
    }

    /**
     * Test packs failed create
     *
     * @group  packs
     * @return void
     */
    public function testPacksCreateFailed()
    {
        $client = static::getApiClient();
        $pack = [
            'itemId' => 12,
            'store' => 'test',
            'quantity' => 2
        ];

        $response = $client->ordersPacksCreate($pack);
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(400, $response->getStatusCode());
        static::assertFalse($response->success);
    }
}
