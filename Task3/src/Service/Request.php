<?php

declare(strict_types=1);

namespace Recruitment\ApiConsumeTask\Service;

class Request
{
    public static function get($var)
    {
        return $_REQUEST[$var] ?? null;
    }
}
