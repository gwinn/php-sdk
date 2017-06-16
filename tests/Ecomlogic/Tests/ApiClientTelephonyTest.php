<?php

/**
 * PHP version 5.4
 *
 * API client telephony test class
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
 * Class ApiClientTelephonyTest
 * @category Ecomlogic
 * @package Ecomlogic\Tests
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
class ApiClientTelephonyTest extends TestCase
{

    const TEL_CODE = 'telephony-code';
    const TEL_CLIENT = '123';
    const TEL_IMAGE = 'http://www.mec.ph/horizon/wp-content/uploads/2011/11/telephony.svg';

    /**
     * Settings Edit test
     *
     * @group telephony
     *
     * @return void
     */
    public function testTelephonySettingsEdit()
    {
        $client = static::getApiClient();

        $response = $client->telephonySettingsEdit(
            self::TEL_CODE,
            self::TEL_CLIENT,
            true,
            'TestTelephony',
            false,
            self::TEL_IMAGE,
            [['userId' => $_SERVER['CRM_USER_ID'], 'code' => '101']],
            [['siteCode' => 'api-client-php', 'externalPhone' => '+74950000000']]
        );

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertTrue(in_array($response->getStatusCode(), [200, 201]));
        static::assertTrue($response->isSuccessful());
    }

    /**
     * Settings Get test
     *
     * @group telephony
     *
     * @return void
     */
    public function testTelephonySettingsGet()
    {
        $client = static::getApiClient();

        $response = $client->telephonySettingsGet(self::TEL_CODE);
        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }

    /**
     * Event test
     *
     * @group telephony
     *
     * @return void
     */
    public function testTelephonyEvent()
    {
        $client = static::getApiClient();

        $response = $client->telephonyCallEvent(
            '+79999999999',
            'in',
            ['101'],
            'failed',
            '+74950000000'

        );

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }

    /**
     * Upload test
     *
     * @group telephony
     *
     * @return void
     */
    public function testTelephonyUpload()
    {
        $client = static::getApiClient();

        $response = $client->telephonyCallsUpload(
            [
                [
                    'date' => '2016-07-22 00:18:00',
                    'type' => 'in',
                    'phone' => '+79999999999',
                    'code' => '101',
                    'result' => 'answered',
                    'externalId' => rand(10, 100),
                    'recordUrl' => 'http://download.retailcrm.pro/api-client-files/beep1.mp3'
                ],
                [
                    'date' => '2016-07-22 00:24:00',
                    'type' => 'in',
                    'phone' => '+79999999999',
                    'code' => '101',
                    'result' => 'answered',
                    'externalId' => rand(10, 100),
                    'recordUrl' => 'http://download.retailcrm.pro/api-client-files/beep2.mp3'
                ]
            ]
        );

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }

    /**
     * Manager test
     *
     * @group telephony
     *
     * @return void
     */
    public function testTelephonyManager()
    {
        $client = static::getApiClient();

        $response = $client->telephonyCallManager('+79999999999', 1);

        static::assertInstanceOf('Ecomlogic\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->isSuccessful());
    }
}
