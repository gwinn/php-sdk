<?php

/**
 * PHP version 5.4
 *
 * API client test class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Tests\Http;

use Ecomlogic\Test\TestCase;
use Ecomlogic\ApiClient;
use Ecomlogic\Http\Client;

/**
 * Class ClientTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */
class ClientTest extends TestCase
{
    /**
     * @group client
     */
    public function testConstruct()
    {
        $client = new Client('https://asdf.df', []);

        static::assertInstanceOf('Ecomlogic\Http\Client', $client);
    }

    /**
     * @group client
     * @expectedException \InvalidArgumentException
     */
    public function testHttpRequiring()
    {
        $client = new Client('http://demo.retailcrm.ru/api/' . $_SERVER['CRM_API_VERSION'], ['apiKey' => '123']);
        return $client;
    }

    /**
     * @group client
     * @expectedException \InvalidArgumentException
     */
    public function testRequestWrongMethod()
    {
        $client = static::getClient();
        $client->makeRequest('/a', 'adsf');
    }

    /**
     * @group client
     * @expectedException \Ecomlogic\Exception\CurlException
     */
    public function testRequestWrongUrl()
    {
        $client = new Client('https://asdf.df', []);
        $client->makeRequest('/a', Client::METHOD_GET, []);
    }

    /**
     * @group client
     */
    public function testRequestSuccess()
    {
        $client = static::getClient();
        $response = $client->makeRequest('/orders', Client::METHOD_GET);

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
    }
}
