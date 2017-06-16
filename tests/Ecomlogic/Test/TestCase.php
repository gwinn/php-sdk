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
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
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
        $configSite    = getenv('CRM_API_SITE') ?: $_SERVER['CRM_API_SITE'];

        return new ApiClient(
            $url ?: $configUrl,
            $apiKey ?: $configKey,
            $version ?: $configVersion,
            $site ?: (isset($configSite) ? $configSite: null)
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
        return new Client(
            $url ?: $_SERVER['CRM_URL'] . '/api/' . getenv('CRM_API_VERSION') ?: $_SERVER['CRM_API_VERSION'],
            [
                'apiKey' => array_key_exists('apiKey', $defaultParameters)
                    ? $defaultParameters['apiKey']
                    : $_SERVER['CRM_API_KEY']
            ]
        );
    }
}
