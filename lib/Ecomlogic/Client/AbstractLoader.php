<?php

/**
 * PHP version 5.4
 *
 * API client class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Client;

use Ecomlogic\Http\Client;

/**
 * PHP version 5.4
 *
 * API client class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
abstract class AbstractLoader
{
    protected $siteCode;
    protected $client;

    /**
     * Init version based client
     *
     * @param string $url     api url
     * @param string $apiKey  api key
     * @param string $version api version
     * @param string $site    site code
     */
    public function __construct($url, $apiKey, $version, $site = null)
    {
        if ('/' !== $url[strlen($url) - 1]) {
            $url .= '/';
        }

        if (empty($version) || !in_array($version, ['v3', 'v4', 'v5'])) {
            throw new \InvalidArgumentException(
                'Version parameter must be not empty and must be equal one of v3|v4|v5'
            );
        }

        $url = $url . 'api/' . $version;

        $this->client = new Client($url, ['apiKey' => $apiKey]);
        $this->siteCode = $site;
    }
}
