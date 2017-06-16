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
trait Users
{
    /**
     * Returns users list
     *
     * @param array $filter
     * @param null  $page
     * @param null  $limit
     *
     * @throws \Ecomlogic\Exception\InvalidJsonException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return ApiResponse
     */
    public function usersList(array $filter = [], $page = null, $limit = null)
    {
        $parameters = [];

        if (count($filter)) {
            $parameters['filter'] = $filter;
        }
        if (null !== $page) {
            $parameters['page'] = (int)$page;
        }
        if (null !== $limit) {
            $parameters['limit'] = (int)$limit;
        }

        return $this->client->makeRequest(
            '/users',
            $this->client::METHOD_GET,
            $parameters
        );
    }

    /**
     * Get user groups
     *
     * @param null $page
     * @param null $limit
     *
     * @throws \Ecomlogic\Exception\InvalidJsonException
     * @throws \Ecomlogic\Exception\CurlException
     *
     * @return ApiResponse
     */
    public function usersGroups($page = null, $limit = null)
    {
        $parameters = [];

        if (null !== $page) {
            $parameters['page'] = (int)$page;
        }
        if (null !== $limit) {
            $parameters['limit'] = (int)$limit;
        }

        return $this->client->makeRequest(
            '/user-groups',
            $this->client::METHOD_GET,
            $parameters
        );
    }

    /**
     * Returns user data
     *
     * @param integer $id user ID
     *
     * @throws \Ecomlogic\Exception\InvalidJsonException
     * @throws \Ecomlogic\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return ApiResponse
     */
    public function usersGet($id)
    {
        return $this->client->makeRequest("/users/$id", $this->client::METHOD_GET);
    }
}
