<?php

declare(strict_types=1);

namespace Recruitment\ApiConsumeTask\Service;

use Recruitment\ApiConsumeTask\Interfaces\Output;

class VoidOutput implements Output
{
    public function print(string $message)
    {
        // just ignore the log messages for this app
    }
}
