<?php

/**
 * PHP version 5.4
 *
 * API client orders test class
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
 * Class ApiClientTasksTest
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientTasksTest extends TestCase
{
    /**
     * @group tasks
     */
    public function testTasksList()
    {
        $client = static::getApiClient();

        $response = $client->tasksList();

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
    }

    /**
     * @group tasks
     * @expectedException \InvalidArgumentException
     */
    public function testTasksCreateExceptionEmpty()
    {
        $client = static::getApiClient();
        $client->tasksCreate([]);
    }

    public function testTasksCRU()
    {
        $client = static::getApiClient();

        $task = [
            'text' => 'test task',
            'commentary' => 'test task commentary',
            'performerId' => $_SERVER['CRM_USER_ID'],
            'complete' => false
        ];

        $responseCreate = $client->tasksCreate($task);

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $responseCreate);
        static::assertEquals(201, $responseCreate->getStatusCode());

        $uid = $responseCreate['id'];

        $responseRead = $client->tasksGet($uid);

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $responseRead);
        static::assertEquals(200, $responseRead->getStatusCode());

        $task['id'] = $uid;
        $task['complete'] = true;

        $responseUpdate = $client->tasksEdit($task);

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $responseUpdate);
        static::assertEquals(200, $responseUpdate->getStatusCode());
    }
}
