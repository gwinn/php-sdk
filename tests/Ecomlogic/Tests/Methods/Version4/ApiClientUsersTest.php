<?php

/**
 * PHP version 5.4
 *
 * API client users test class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Tests\Methods\Version4;

use Ecomlogic\Test\TestCase;

/**
 * Class ApiClientUsersTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientUsersTest extends TestCase
{
    /**
     * @group users_v4
     */
    public function testUsersGroups()
    {
        $client = static::getApiClient(null, null, "v4");

        $response = $client->request->usersGroups();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group users_v4
     */
    public function testUsersList()
    {
        $client = static::getApiClient(null, null, "v4");

        $response = $client->request->usersList();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group users_v4
     */
    public function testUsersGet()
    {
        $client = static::getApiClient(null, null, "v4");

        $response = $client->request->usersGet($_SERVER["ECOMLOGIC_USER"]);
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }
}
