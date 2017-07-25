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
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Tests\Methods\Version5;

use Ecomlogic\Test\TestCase;

/**
 * Class ApiClientPricesTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientPricesTest extends TestCase
{

    /**
     * @group prices_v5
     */
    public function testPricesEdit()
    {
        $client = static::getApiClient();

        $response = $client->request->pricesTypesEdit(
            [
                'code' => 'sample_v4_price_code',
                'name' => 'Sample v4 price type',
                'ordering' => 500,
                'active' => true
            ]
        );

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @depends testPricesEdit
     * @group prices_v5
     */
    public function testPricesGet()
    {
        $client = static::getApiClient();
        $response = $client->request->pricesTypes();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }



    /**
     * @group prices_v5
     * @expectedException \InvalidArgumentException
     */
    public function testPricesUploadExceptionEmpty()
    {
        $client = static::getApiClient();
        $client->request->storePricesUpload([]);
    }

    /**
     * @depends testPricesEdit
     * @group prices_v5
     */
    public function testPricesUpload()
    {

        $client = static::getApiClient();

        $xmlIdA = 'upload-a-' . time();
        $xmlIdB = 'upload-b-' . time();

        $response = $client->request->storePricesUpload([
            [
                'xmlId' => $xmlIdA,
                'prices' => [
                    [
                        'code' => 'sample_v4_price_code',
                        'price' => 1700
                    ]
                ]
            ],
            [
                'xmlId' => $xmlIdB,
                'prices' => [
                    [
                        'code' => 'sample_v4_price_code',
                        'price' => 1500
                    ]
                ]
            ],
        ]);

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
    }
}
