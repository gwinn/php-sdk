<?php

/**
 * PHP version 5.4
 *
 * ReferencesTrait
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Methods\V5;

use Ecomlogic\Methods\V4\References as Previous;

/**
 * PHP version 5.4
 *
 * ReferencesTrait class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
trait References
{
    use Previous;

    /**
     * Get costs groups
     *
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function costGroups()
    {
        return $this->client->makeRequest(
            '/reference/cost-groups',
            "GET"
        );
    }

    /**
     * Edit costs groups
     *
     * @param array $data
     *
     * @throws \InvalidArgumentException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function costGroupsEdit(array $data)
    {
        if (!array_key_exists('code', $data)) {
            throw new \InvalidArgumentException(
                'Data must contain "code" parameter.'
            );
        }

        if (!array_key_exists('name', $data)) {
            throw new \InvalidArgumentException(
                'Data must contain "name" parameter.'
            );
        }

        if (!array_key_exists('color', $data)) {
            throw new \InvalidArgumentException(
                'Data must contain "color" parameter.'
            );
        }

        return $this->client->makeRequest(
            sprintf('/reference/cost-groups/%s/edit', $data['code']),
            "POST",
            ['costGroup' => json_encode($data)]
        );
    }

    /**
     * Get costs items
     *
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function costItems()
    {
        return $this->client->makeRequest(
            '/reference/cost-items',
            "GET"
        );
    }

    /**
     * Edit costs items
     *
     * @param array $data
     *
     * @throws \InvalidArgumentException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function costItemsEdit(array $data)
    {
        if (!array_key_exists('code', $data)) {
            throw new \InvalidArgumentException(
                'Data must contain "code" parameter.'
            );
        }

        if (!array_key_exists('name', $data)) {
            throw new \InvalidArgumentException(
                'Data must contain "name" parameter.'
            );
        }

        return $this->client->makeRequest(
            sprintf('/reference/cost-items/%s/edit', $data['code']),
            "POST",
            ['costItem' => json_encode($data)]
        );
    }

    /**
     * Get legal entities
     *
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function legalEntities()
    {
        return $this->client->makeRequest(
            '/reference/legal-entities',
            "GET"
        );
    }

    /**
     * Edit legal entity
     *
     * @param array $data
     *
     * @throws \InvalidArgumentException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function legalEntitiesEdit(array $data)
    {
        if (!array_key_exists('code', $data)) {
            throw new \InvalidArgumentException(
                'Data must contain "code" parameter.'
            );
        }

        return $this->client->makeRequest(
            sprintf('/reference/legal-entities/%s/edit', $data['code']),
            "POST",
            ['legalEntity' => json_encode($data)]
        );
    }
}
