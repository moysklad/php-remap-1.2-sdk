<?php

namespace OpenAPI\Client\Test\Utils;

use OpenAPI\Client\Configuration;
use OpenAPI\Client\Model\Application;
use OpenAPI\Client\Model\Counterparty;
use OpenAPI\Client\Model\Currency;
use OpenAPI\Client\Model\Employee;
use OpenAPI\Client\Model\Group;
use OpenAPI\Client\Model\Meta;
use OpenAPI\Client\Model\Product;
use OpenAPI\Client\Model\ProductFolder;
use OpenAPI\Client\Model\Store;

class EntityUtil
{
    // Entities
    public static function createProductRef(string $id): Product { return self::makeRef(Product::class, 'product', $id); }
    public static function createCounterpartyRef(string $id): Counterparty { return self::makeRef(Counterparty::class, 'counterparty', $id); }
    public static function createStoreRef(string $id): Store { return self::makeRef(Store::class, 'store', $id); }
    public static function createEmployeeRef(string $id): Employee { return self::makeRef(Employee::class, 'employee', $id); }
    public static function createGroupRef(string $id): Group { return self::makeRef(Group::class, 'group', $id); }
    public static function createCurrencyRef(string $id): Currency { return self::makeRef(Currency::class, 'currency', $id); }
    public static function createApplicationRef(string $id): Application { return self::makeRef(Application::class, 'application', $id); }
    public static function createProductFolderRef(string $id): Application { return self::makeRef(ProductFolder::class, 'productFolder', $id); }

    private static function makeRef(string $className, string $type, string $id)
    {
        $obj = new $className();
        $obj->setMeta(self::makeMeta($type, $id));
        return $obj;
    }

    private static function makeMeta(string $type, string $id): Meta
    {
        $base = rtrim(Configuration::getDefaultConfiguration()->getHost(), '/');
        return new Meta([
            'href' => "{$base}/entity/{$type}/{$id}",
            'type' => $type,
        ]);
    }
}