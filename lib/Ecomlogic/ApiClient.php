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

namespace Ecomlogic;

use Ecomlogic\Client\ApiVersion3;
use Ecomlogic\Client\ApiVersion4;
use Ecomlogic\Client\ApiVersion5;

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
class ApiClient
{
    public $request;
    public $version;

    /**
     * Init version based client
     *
     * @param string $url     api url
     * @param string $apiKey  api key
     * @param string $version api version
     * @param string $site    site code
     */
    public function __construct($url, $apiKey, $version = null, $site = null)
    {
        $this->version = $version;

        switch ($version) {
        case 'v5':
            $this->request = new ApiVersion5($url, $apiKey, $version, $site);
            break;
        case 'v4':
            $this->request = new ApiVersion4($url, $apiKey, $version, $site);
            break;
        case 'v3':
            $this->request = new ApiVersion3($url, $apiKey, $version, $site);
            break;
        case null:
            $this->request = new ApiVersion3($url, $apiKey, null, $site);
            break;
        }
    }

    /**
     * Get API version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
