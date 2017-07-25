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

namespace Ecomlogic\Tests\Methods\Version5;

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
     * @group users_v5
     */
    public function testUsersGroups()
    {
        $client = static::getApiClient();

        $response = $client->request->usersGroups();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group users_v5
     */
    public function testUsersList()
    {
        $client = static::getApiClient();

        $response = $client->request->usersList();
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group users_v5
     */
    public function testUsersGet()
    {
        $client = static::getApiClient();
        $response = $client->request->usersGet($_SERVER["CRM_USER_ID"]);
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }

    /**
     * @group users_v5
     */
    public function testUsersStatus()
    {
        $client = static::getApiClient();
        $response = $client->request->usersStatus($_SERVER["CRM_USER_ID"], 'dinner');
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }
}
