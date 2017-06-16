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

namespace Ecomlogic\Methods\V4;

/**
 * PHP version 5.4
 *
 * Marketplace class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
trait Marketplace
{

    /**
     * Edit marketplace configuration
     *
     * @param array $configuration
     *
     * @throws \Ecomlogic\Exception\InvalidJsonException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return ApiResponse
     */
    public function marketplaceSettingsEdit(array $configuration)
    {
        if (!count($configuration) || empty($configuration['code'])) {
            throw new \InvalidArgumentException(
                'Parameter `configuration` must contains a data & configuration `code` must be set'
            );
        }

        return $this->client->makeRequest(
            sprintf('/marketplace/external/setting/%s/edit', $configuration['code']),
            $this->client::METHOD_POST,
            ['configuration' => json_encode($configuration)]
        );
    }
}
