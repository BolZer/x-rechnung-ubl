<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUblTests;

use Bolzer\XRechnungUblTests\Traits\ReformatXmlTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use ReformatXmlTrait;
}
