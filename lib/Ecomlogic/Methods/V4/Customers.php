<?php

/**
 * PHP version 5.4
 *
 * CustomersTrait
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Methods\V4;

use Ecomlogic\Methods\V3\Customers as Previous;

/**
 * PHP version 5.4
 *
 * CustomersTrait class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
trait Customers
{
    use Previous;

    /**
     * Get customers history
     * @param array $filter
     * @param null $page
     * @param null $limit
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function customersHistory(array $filter = [], $page = null, $limit = null)
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
            '/customers/history',
            "GET",
            $parameters
        );
    }
}
