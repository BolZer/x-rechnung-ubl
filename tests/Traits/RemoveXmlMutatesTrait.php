<?php

declare(strict_types=1);

namespace Traits;

namespace Bolzer\XRechnungUblTests\Traits;

trait RemoveXmlMutatesTrait
{
    public static function removeXmlMutates(string $xml): string
    {
        return preg_replace('/ <\?xmute(.|\s)*?>/', '', $xml);
    }
}
