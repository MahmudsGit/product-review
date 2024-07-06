<?php

namespace Core;

class Request
{
    public static function capture()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}
