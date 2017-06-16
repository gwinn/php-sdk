<?php

/**
 * PHP version 5.4
 *
 * API client prices test class
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
 * Class ApiClientPricesTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientPricesTest extends TestCase
{

    protected $code;

    /**
     * ApiClientPricesTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->code = 'price-code-a-' . time();
    }

    /**
     * @group prices
     */
    public function testUsersGroups()
    {
        $client = static::getApiClient();

        $response = $client->usersGroups();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group prices
     */
    public function testPricesGet()
    {
        $client = static::getApiClient();

        $response = $client->pricesTypes();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group prices
     */
    public function testPricesEdit()
    {

        $client = static::getApiClient();

        $response = $client->pricesEdit(
            [
                'code' => $this->code,
                'name' => $this->code,
                'ordering' => 500,
                'active' => true
            ]
        );

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(201, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group prices
     * @expectedException \InvalidArgumentException
     */
    public function testPricesUploadExceptionEmpty()
    {
        $client = static::getApiClient();
        $client->storePricesUpload([]);
    }

    /**
     * @group prices
     */
    public function testPricesUpload()
    {
        $client = static::getApiClient();

        $xmlIdA = 'upload-a-' . time();
        $xmlIdB = 'upload-b-' . time();

        $response = $client->storePricesUpload([
            [
                'xmlId' => $xmlIdA,
                'prices' => [
                    [
                        'code' => $this->code,
                        'price' => 1700
                    ]
                ]
            ],
            [
                'xmlId' => $xmlIdB,
                'prices' => [
                    [
                        'code' => $this->code,
                        'price' => 1500
                    ]
                ]
            ],
        ]);

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
    }
}
