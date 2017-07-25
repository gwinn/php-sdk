<?php

/**
 * PHP version 5.4
 *
 * Test case class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Test;

use Ecomlogic\ApiClient;
use Ecomlogic\Http\Client;

/**
 * Class TestCase
 *
 * @package Ecomlogic\Test
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Return ApiClient object
     *
     * @param  string    $url (default: null)
     * @param  string    $apiKey (default: null)
     * @param  string    $version (default: null)
     * @param  string    $site (default: null)
     *
     * @return ApiClient
     */
    public static function getApiClient($url = null, $apiKey = null, $version = null, $site = null)
    {
        $configUrl     = getenv('CRM_API_URL') ?: $_SERVER['CRM_API_URL'];
        $configKey     = getenv('CRM_API_KEY') ?: $_SERVER['CRM_API_KEY'];
        $configVersion = getenv('CRM_API_VERSION') ?: $_SERVER['CRM_API_VERSION'];

        return new ApiClient(
            $url ?: $configUrl,
            $apiKey ?: $configKey,
            $version ?: $configVersion,
            $site ?: null
        );
    }

    /**
     * Return Client object
     *
     * @param  string $url (default: null)
     * @param  array  $defaultParameters (default: array())
     *
     * @return Client
     */
    public static function getClient($url = null, $defaultParameters = [])
    {
        $version = getenv('CRM_API_VERSION');

        if (false == $version) {
            $version = $_SERVER['CRM_API_VERSION'];
        }

        return new Client(
            $url ?: $_SERVER['CRM_API_URL'] . '/api/' .  $version,
            [
                'apiKey' => array_key_exists('apiKey', $defaultParameters)
                    ? $defaultParameters['apiKey']
                    : $_SERVER['CRM_API_KEY']
            ]
        );
    }
}
