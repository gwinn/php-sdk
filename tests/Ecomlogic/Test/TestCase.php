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
 * @category Ecomlogic
 * @package  Ecomlogic\Test
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://ecomlogic.com/docs/Developers/ApiVersion5
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Return ApiClient object
     *
     * @param string $url     (default: null)
     * @param string $apiKey  (default: null)
     * @param string $version (default: null)
     * @param string $site    (default: null)
     *
     * @return ApiClient
     */
    public static function getApiClient(
        $url = null,
        $apiKey = null,
        $version = null,
        $site = null
    ) {
        $confUrl     = getenv('ECOMLOGIC_URL') ?: $_SERVER['ECOMLOGIC_URL'];
        $confKey     = getenv('ECOMLOGIC_KEY') ?: $_SERVER['ECOMLOGIC_KEY'];
        $confVersion = getenv('ECOMLOGIC_VERSION') ?: $_SERVER['ECOMLOGIC_VERSION'];

        return new ApiClient(
            $url ?: $confUrl,
            $apiKey ?: $confKey,
            $version ?: $confVersion,
            $site ?: null
        );
    }

    /**
     * Return Client object
     *
     * @param string $url               (default: null)
     * @param array  $defaultParameters (default: array())
     *
     * @return Client
     */
    public static function getClient($url = null, $defaultParameters = [])
    {
        $version = getenv('ECOMLOGIC_VERSION');

        if (false == $version) {
            $version = $_SERVER['ECOMLOGIC_VERSION'];
        }

        return new Client(
            $url ?: $_SERVER['ECOMLOGIC_URL'] . '/api/' .  $version,
            [
                'apiKey' => array_key_exists('apiKey', $defaultParameters)
                    ? $defaultParameters['apiKey']
                    : $_SERVER['ECOMLOGIC_KEY']
            ]
        );
    }
}
