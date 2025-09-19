<?php

namespace OpenAPI\Client\Test\Utils;

use PHPUnit\Framework\Assert;

class Asserter
{

    /**
     * @param \OpenAPI\Client\Model\Meta $meta meta
     * @param string $expectedHrefContainsId
     * @param string|null $expectedType (optional)
     */
    public static function assertMeta(\OpenAPI\Client\Model\Meta $meta, string $expectedHrefContainsId, string $expectedType = null)
    {
        Assert::assertNotNull($meta);
        Assert::assertContains($expectedHrefContainsId, $meta->getHref());
        if ($expectedType != null) {
            Assert::assertEquals($expectedType, $meta->getType());
        }
//        TODO метод проверки неполный
    }
}