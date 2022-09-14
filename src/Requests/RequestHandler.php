<?php

namespace App\Requests;

class RequestHandler
{

    private static $params = array();

    public static function setParams($request)
    {
        switch ($request->getMethod()) {
            case 'POST':
                self::$params = $request->getParsedBody();
                break;
        }

        // $postParams = $request->getParsedBody();

        // $getParams = $request->getQueryParams();

        // $getBody = json_decode($request->getBody(), true);

        // $result = $default;

        // if(is_array($postParams) && isset($postParams[$key]))
        // {
        //     $result = $postParams[$key];

        // }else if(is_object($postParams) && property_exists($postParams, $key))
        // {
        //     $result = $postParams->$key;
        // }
        // else if(is_array($getBody) && isset($getBody[$key]))
        // {
        //     $result = $getBody[$key];

        // }else if(isset($getParams[$key]))
        // {
        //     $result = $getParams[$key];
        // }
        // return $result;
    }

    public static function getParam($key, $default = null)
    {


        if (is_array(self::$params) && isset(self::$params[$key])) {
            return self::$params[$key];
        } else if (is_object(self::$params) && property_exists(self::$params, $key)) {

            return self::$params->$key;
        }

        return $default;
    }

    public static function getParams()
    {
        return self::$params;
    }
}
