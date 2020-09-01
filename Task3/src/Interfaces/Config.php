<?php

declare(strict_types=1);

namespace Recruitment\ApiConsumeTask\Interfaces;

interface Config
{
    public function getSingleValue(string $keyName): string;

    public function getArray(string $keyName): array;
}
