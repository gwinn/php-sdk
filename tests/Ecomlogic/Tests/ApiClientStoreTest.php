<?php

/**
 * PHP version 5.4
 *
 * API client store test class
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
 * Class ApiClientStoreTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientStoreTest extends TestCase
{
    const SNAME = 'Test Store';
    const SCODE = 'test-store';

    /**
     * @group store
     */
    public function testStoreCreate()
    {
        $client = static::getApiClient();

        $response = $client->storesEdit(['name' => self::SNAME, 'code' => self::SCODE]);
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group store
     */
    public function testStoreInventories()
    {
        $client = static::getApiClient();

        $response = $client->storeInventories();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
        static::assertTrue(
            isset($response['offers']),
            'API returns orders assembly history'
        );
    }

    /**
     * @group store
     * @expectedException \InvalidArgumentException
     */
    public function testInventoriesException()
    {
        $client = static::getApiClient();
        $client->storeInventoriesUpload([]);
    }

    /**
     * @group store
     */
    public function testInventoriesUpload()
    {
        $client = static::getApiClient();

        $response = $client->storeInventoriesUpload([
            [
                'externalId' => 'pTKIKAeghYzX21HTdzFCe1',
                'stores' => [
                    [
                        'code' => self::SCODE,
                        'available' => 10,
                        'purchasePrice' => 1700
                    ]
                ]
            ],
            [
                'externalId' => 'JQIvcrCtiSpOV3AAfMiQB3',
                'stores' => [
                    [
                        'code' => self::SCODE,
                        'available' => 20,
                        'purchasePrice' => 1500
                    ]
                ]
            ],
        ]);

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group dev
     */
    public function testInventoriesFailed()
    {
        $client = static::getApiClient();

        $externalIdA = 'upload-a-' . time();
        $externalIdB = 'upload-b-' . time();

        $response = $client->storeInventoriesUpload([
            [
                'externalId' => $externalIdA,
                'available' => 10,
                'purchasePrice' => 1700
            ],
            [
                'externalId' => $externalIdB,
                'available' => 20,
                'purchasePrice' => 1500
            ],
        ]);
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(400, $response->getStatusCode());
        static::assertTrue(isset($response['errorMsg']), $response['errorMsg']);
    }

    /**
     * @group store
     */
    public function testStoreProducts()
    {
        $client = static::getApiClient();

        $response = $client->storeProducts();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group store
     */
    public function testStoreProductsGroups()
    {
        $client = static::getApiClient();

        $response = $client->storeProductsGroups();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }
}
