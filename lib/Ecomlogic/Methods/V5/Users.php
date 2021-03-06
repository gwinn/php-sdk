<?php

/**
 * PHP version 5.4
 *
 * UsersTrait
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */

namespace Ecomlogic\Methods\V5;

use Ecomlogic\Response\ApiResponse;
use Ecomlogic\Methods\V4\Users as Previous;

/**
 * PHP version 5.4
 *
 * UsersTrait class
 *
 * @category Ecomlogic
 * @package  Ecomlogic
 * @author   Ecomlogic <dev@ecomlogic.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.ecomlogic.com/docs/Developers/ApiVersion5
 */
trait Users
{
    use Previous;

    /**
     * Change user status
     *
     * @param integer $id     user ID
     * @param string  $status user status
     *
     * @return \Ecomlogic\Response\ApiResponse
     */
    public function usersStatus($id, $status)
    {
        $statuses = ["free", "busy", "dinner", "break"];

        if (empty($status) || !in_array($status, $statuses)) {
            throw new \InvalidArgumentException(
                'Parameter `status` must be not empty & must be equal one of these values: free|busy|dinner|break'
            );
        }

        /** @noinspection PhpUndefinedMethodInspection */
        return $this->client->makeRequest(
            "/users/$id/status",
            "POST",
            ['status' => $status]
        );
    }
}
