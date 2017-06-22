<?php

/**
 * PHP version 5.4
 *
 * TaskTrait
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Methods\V4;

use Ecomlogic\Methods\V3\Stores as Previous;

/**
 * PHP version 5.4
 *
 * TaskTrait class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
trait Stores
{
    use Previous;

    /**
     * Get store settings
     *
     * @param string $code get settings code
     *
     * @return \Ecomlogic\Response\ApiResponse
     * @throws \Ecomlogic\Exception\InvalidJsonException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function storeSettingsGet($code)
    {
        if (empty($code)) {
            throw new \InvalidArgumentException('Parameter `code` must be set');
        }

        return $this->client->makeRequest(
            "/store/setting/$code",
            "GET"
        );
    }

    /**
     * Edit store configuration
     *
     * @param array $configuration
     *
     * @throws \Ecomlogic\Exception\InvalidJsonException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function storeSettingsEdit(array $configuration)
    {
        if (!count($configuration) || empty($configuration['code'])) {
            throw new \InvalidArgumentException(
                'Parameter `configuration` must contains a data & configuration `code` must be set'
            );
        }

        return $this->client->makeRequest(
            sprintf('/store/setting/%s/edit', $configuration['code']),
            "POST",
            ['configuration' => json_encode($configuration)]
        );
    }

    /**
     * Upload store prices
     *
     * @param array  $prices prices data
     * @param string $site   default: null)
     *
     * @throws \InvalidArgumentException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function storePricesUpload(array $prices, $site = null)
    {
        if (!count($prices)) {
            throw new \InvalidArgumentException(
                'Parameter `prices` must contains array of the prices'
            );
        }

        return $this->client->makeRequest(
            '/store/prices/upload',
            "POST",
            $this->fillSite($site, ['prices' => json_encode($prices)])
        );
    }

    /**
     * Get products
     *
     * @param array $filter (default: array())
     * @param int   $page   (default: null)
     * @param int   $limit  (default: null)
     *
     * @throws \InvalidArgumentException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function storeProducts(array $filter = [], $page = null, $limit = null)
    {
        $parameters = [];

        if (count($filter)) {
            $parameters['filter'] = $filter;
        }
        if (null !== $page) {
            $parameters['page'] = (int) $page;
        }
        if (null !== $limit) {
            $parameters['limit'] = (int) $limit;
        }

        return $this->client->makeRequest(
            '/store/products',
            "GET",
            $parameters
        );
    }
}
