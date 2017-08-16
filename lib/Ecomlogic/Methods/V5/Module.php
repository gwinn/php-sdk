<?php

/**
 * PHP version 5.4
 *
 * Marketplace
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
 * Module class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
trait Module
{
    /**
     * Get module configuration
     *
     * @param string $code
     *
     * @throws \Ecomlogic\Exception\InvalidJsonException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function integrationModulesGet(string $code)
    {
        if (empty($code)) {
            throw new \InvalidArgumentException(
                'Parameter `code` must be set'
            );
        }

        return $this->client->makeRequest(
            sprintf('/integration-modules/%s', $code),
            "GET"
        );
    }

    /**
     * Edit module configuration
     *
     * @param array $configuration
     *
     * @throws \Ecomlogic\Exception\InvalidJsonException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function integrationModulesEdit(array $configuration)
    {
        if (!count($configuration) || empty($configuration['code'])) {
            throw new \InvalidArgumentException(
                'Parameter `configuration` must contains a data & configuration `code` must be set'
            );
        }

        return $this->client->makeRequest(
            sprintf('/integration-modules/%s/edit', $configuration['code']),
            "POST",
            ['configuration' => json_encode($configuration)]
        );
    }
}
