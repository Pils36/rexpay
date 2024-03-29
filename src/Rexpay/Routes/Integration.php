<?php

namespace Pils36\Rexpay\Routes;

use Pils36\Rexpay\Contracts\RouteInterface;

class Integration implements RouteInterface
{

    public static function root()
    {
        return '/integration';
    }

    public static function paymentSessionTimeout()
    {
        return [ RouteInterface::METHOD_KEY   => RouteInterface::GET_METHOD,
            RouteInterface::ENDPOINT_KEY => Integration::root() . '/payment_session_timeout',
            RouteInterface::PARAMS_KEY   => [] ];
    }

    public static function updatePaymentSessionTimeout()
    {
        return [
            RouteInterface::METHOD_KEY   => RouteInterface::PUT_METHOD,
            RouteInterface::ENDPOINT_KEY => Integration::root() . '/payment_session_timeout',
            RouteInterface::PARAMS_KEY   => ['timeout'],
        ];
    }
}
