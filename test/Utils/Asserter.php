<?php

namespace OpenAPI\Client\Test\Utils;

use OpenAPI\Client\Model\Meta;
use PHPUnit\Framework\Assert;

class Asserter
{

    /**
     * @param Meta $meta meta
     * @param string $expectedHrefContainsId
     * @param string|null $expectedType (optional)
     */
    public static function assertMeta(Meta $meta, string $expectedHrefContainsId, string $expectedType = null)
    {
        Assert::assertNotNull($meta);
        Assert::assertContains($expectedHrefContainsId, $meta->getHref());
        if ($expectedType != null) {
            Assert::assertSame($expectedType, $meta->getType());
        }
//        TODO метод проверки неполный
    }

    public static function assertJsonHasFields(object $object, array $expectedFields, string $path = ''): void
    {
        $json = json_encode($object, JSON_THROW_ON_ERROR);
        $decoded = json_decode($json, true);

        foreach ($expectedFields as $field => $expectedValue) {
            $fullPath = $path === '' ? $field : "{$path}.{$field}";

            Assert::assertArrayHasKey(
                $field,
                $decoded,
                "Поле '{$fullPath}' отсутствует в сериализованном JSON"
            );

            $actualValue = $decoded[$field];

            if (is_array($expectedValue) && !isset($expectedValue[0])) {
                // ожидаем объект → рекурсивно проверяем
                self::assertJsonHasFields((object)$actualValue, $expectedValue, $fullPath);
            } elseif (is_array($expectedValue)) {
                // ожидаем массив → проверяем каждый элемент
                Assert::assertIsArray(
                    $actualValue,
                    "Поле '{$fullPath}' должно быть массивом"
                );

                Assert::assertCount(
                    count($expectedValue),
                    $actualValue,
                    "Количество элементов массива '{$fullPath}' не совпадает"
                );

                foreach ($expectedValue as $index => $subExpected) {
                    if (is_array($subExpected)) {
                        self::assertJsonHasFields((object)$actualValue[$index], $subExpected, "{$fullPath}[{$index}]");
                    } else {
                        Assert::assertEquals(
                            $subExpected,
                            $actualValue[$index],
                            "Значение массива '{$fullPath}[{$index}]' не совпадает"
                        );
                    }
                }
            } else {
                // примитив
                Assert::assertEquals(
                    $expectedValue,
                    $actualValue,
                    "Поле '{$fullPath}' имеет неверное значение"
                );
            }
        }

        // Проверка что НЕТ лишних полей
        Assert::assertEqualsCanonicalizing(
            array_keys($expectedFields),
            array_keys($decoded),
            "Объект '{$path}' содержит лишние поля"
        );
    }
}