<?php

declare(strict_types=1);

namespace Recruitment\ApiConsumeTask\Model;

// this is just a dummy class that does nothing
class User
{
    public $clientId;
    public $clientSecret;
    public $storeHash;
    public $accessToken;

    public static function getCurrent()
    {
        return $GLOBALS['CurrentUser'] ?? null;
    }

    public function save()
    {
        $GLOBALS['CurrentUser'] = $this;
    }
}
