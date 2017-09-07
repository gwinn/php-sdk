<?php

/**
 * PHP version 5.4
 *
 * ApiTrait
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
namespace Ecomlogic\Methods\V5;

/**
 * PHP version 5.4
 *
 * ApiTrait class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
trait Api
{
    /**
     * Get available api versions
     *
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function apiVersions()
    {
        return $this->client->makeRequest(
            '/api/api-versions',
            "GET"
        );
    }

    /**
     * Get available api methods & available sites
     *
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function apiCredentials()
    {
        return $this->client->makeRequest(
            '/api/credentials',
            "GET"
        );
    }
}