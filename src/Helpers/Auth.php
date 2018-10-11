<?php
/**
 * Created by Hashstudio.
 * User: Alexandr Gordeev
 * Date: 11.10.18
 * Time: 16:45
 * @author hashstudio
 * @email mail@hashstudio.ru
 * @website hashstudio.ru
 */

namespace App\Helpers;


class Auth
{
    public static $authToken = "zcas1324123asdasd123112";

    public static function isAllowed()
    {
        return isset($_SERVER['HTTP_AUTH_TOKEN']) && $_SERVER['HTTP_AUTH_TOKEN'] === self::$authToken;
    }
}
