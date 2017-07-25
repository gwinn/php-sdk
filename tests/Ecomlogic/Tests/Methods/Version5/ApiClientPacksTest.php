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
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Tests\Methods\Version5;

use Ecomlogic\Test\TestCase;

/**
 * Class ApiClientPacksTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientPacksTest extends TestCase
{
    /**
     * @group packs_v5
     */
    public function testPacksHistory()
    {
        $client = static::getApiClient();

        $response = $client->request->ordersPacksHistory();
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
     * @group packs_v5
     */
    public function testPacksCreateFailed()
    {
        $client = static::getApiClient();

        $pack = [
            'itemId' => 12,
            'store' => 'test',
            'quantity' => 2
        ];

        $response = $client->request->ordersPacksCreate($pack);
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(400, $response->getStatusCode());
        static::assertFalse($response->success);
    }
}
