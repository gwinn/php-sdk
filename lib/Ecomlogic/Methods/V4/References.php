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

use Ecomlogic\Methods\V3\References as Previous;

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
trait References
{
    use Previous;

    /**
     * Get prices types
     *
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return ApiResponse
     */
    public function pricesTypes()
    {
        return $this->client->makeRequest(
            '/reference/price-types',
            $this->client::METHOD_GET
        );
    }

    /**
     * Edit price type
     *
     * @param array $data
     *
     * @throws \InvalidArgumentException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \Ecomlogic\Exception\InvalidJsonException
     *
     * @return ApiResponse
     */
    public function pricesTypesEdit(array $data)
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
            sprintf('/reference/price-types/%s/edit', $data['code']),
            $this->client::METHOD_POST,
            ['priceType' => json_encode($data)]
        );
    }
}
