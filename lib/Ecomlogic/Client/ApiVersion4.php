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

namespace Ecomlogic\Client;

use Ecomlogic\Methods\V4;

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
class ApiVersion4 extends AbstractLoader
{
    /**
     * Init version based client
     *
     * @param string $url     api url
     * @param string $apiKey  api key
     * @param string $version api version
     * @param string $site    site code
     *
     */
    public function __construct($url, $apiKey, $version, $site)
    {
        parent::__construct($url, $apiKey, $version, $site);
    }

    use V4\Customers;
    use V4\Delivery;
    use V4\Marketplace;
    use V4\Orders;
    use V4\Packs;
    use V4\References;
    use V4\Statistic;
    use V4\Stores;
    use V4\Telephony;
    use V4\Users;
}
