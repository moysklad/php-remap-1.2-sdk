<?php

namespace OpenAPI\Client\Test\Utils;

use OpenAPI\Client\Model\Meta;
use OpenAPI\Client\Model\MetaList;
use PHPUnit\Framework\Assert;

class Asserter
{

    /**
     * @param Meta $meta meta
     * @param string $expectedHrefContains
     * @param string|null $expectedType (optional)
     */
    public static function assertMeta(Meta $meta, string $expectedHrefContains, string $expectedType = null)
    {
        Assert::assertNotNull($meta);
        Assert::assertContains($expectedHrefContains, $meta->getHref());
        if ($expectedType != null) {
            Assert::assertSame($expectedType, $meta->getType());
        }
//        TODO метод проверки неполный
    }

    public static function assertMetaCollection(MetaList $meta, string $expectedHrefAfterPathRemap12Entity, int $expectedSize = 0, int $expectedLimit = 1000, string $expectedType = null)
    {
        Assert::assertNotNull($meta);
        $path = parse_url($meta->getHref(), PHP_URL_PATH);
        Assert::assertTrue(str_ends_with($path, $expectedHrefAfterPathRemap12Entity));
        if ($expectedType != null) {
            Assert::assertSame($expectedType, $meta->getType());
        }
        Assert::assertSame($expectedSize, $meta->getSize());
        Assert::assertSame($expectedLimit, $meta->getLimit());
//        TODO метод проверки неполный
    }


    /**
     * @param $object Entity object
     * @param array $expectedFields
     * @param bool $strictMode (optional) - Флаг регулирует поведение на неуказанные в expectedFields поля
     * @param string $path (optional) - Путь по названиям полей через точку до нужного поля
     */
    public static function assertJsonHasFields(object $object, array $expectedFields, bool $strictMode = true, string $path = ''): void
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
                self::assertJsonHasFields((object)$actualValue, $expectedValue, $strictMode, $fullPath);
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
                        self::assertJsonHasFields((object)$actualValue[$index], $subExpected, $strictMode, "{$fullPath}[{$index}]");
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

        if ($strictMode) {
            // Проверка что НЕТ лишних полей
            Assert::assertEqualsCanonicalizing(
                array_keys($expectedFields),
                array_keys($decoded),
                "Объект '{$path}' содержит лишние поля"
            );
        }
    }
}