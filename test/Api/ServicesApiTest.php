<?php
/**
 * ServicesApiTest
 * PHP version 8.1
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

namespace OpenAPI\Client\Test\Api;

use OpenAPI\Client\Api\ServicesApi;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\Model\Barcode;
use OpenAPI\Client\Model\BuyPrice;
use OpenAPI\Client\Model\DeleteInfo;
use OpenAPI\Client\Model\FileList;
use OpenAPI\Client\Model\Service;
use OpenAPI\Client\Model\ServiceList;
use OpenAPI\Client\Test\Utils\Asserter;
use OpenAPI\Client\Test\Utils\StringUtil;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

/**
 * ServicesApiTest Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ServicesApiTest extends TestCase
{

    private static ServicesApi $api;

    public static function setUpBeforeClass(): void
    {
        $config = Configuration::getDefaultConfiguration()
            ->setHost(getenv('API_HOST') . '/api/remap/1.2')
            ->setUsername(getenv('API_LOGIN'))
            ->setPassword(getenv('API_PASSWORD'));

        ServicesApiTest::$api = new ServicesApi(null, $config);
    }

    /**
     * Проверка успешной обработки ответа сервера на получение услуг
     */
    public function testEntityServiceGet(): void
    {
        $prefix = StringUtil::randomUuid();
        $service1 = new Service();
        $service1->setName("$prefix Service 1");
        $service1->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
        $service1 = ServicesApiTest::$api->entityServicePost($service1);

        $service2 = new Service();
        $service2->setName("$prefix Service 2");
        $service2->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_WORK);
        $service2 = ServicesApiTest::$api->entityServicePost($service2);

        $service3 = new Service();
        $service3->setName("$prefix Service 3");
        $service3->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
        $service3 = ServicesApiTest::$api->entityServicePost($service3);

        Assert::assertNotSame($service1->getId(), $service2->getId());
        Assert::assertNotSame($service2->getId(), $service3->getId());

        $serviceList_12 = ServicesApiTest::$api->entityServiceGet(2, 0, null, "name~=$prefix", null, 'name');
        Assert::assertInstanceOf(ServiceList::class, $serviceList_12);
        Asserter::assertMetaCollection($serviceList_12->getMeta(), 'service', 3, 2, 'service');
        Asserter::assertJsonHasFields($serviceList_12, ['meta' => []], false, 'context.employee');
        Asserter::assertJsonHasFields($serviceList_12, [
            'rows' => [
                ['id' => $service1->getId()],
                ['id' => $service2->getId()]
            ]], false);

        $serviceList_23 = ServicesApiTest::$api->entityServiceGet(3, 1, null, "name~=$prefix", null, 'name');
        Assert::assertInstanceOf(ServiceList::class, $serviceList_23);
        Asserter::assertMetaCollection($serviceList_23->getMeta(), 'service', 3, 3, 'service');
        Asserter::assertJsonHasFields($serviceList_23, ['meta' => []], false, 'context.employee');
        Asserter::assertJsonHasFields($serviceList_23, [
            'rows' => [
                ['id' => $service2->getId()],
                ['id' => $service3->getId()]
            ]], false);
    }

    /**
     * Проверка обработки ответа сервера на получение услуг сопровождаемое ошибкой
     */
    public function testEntityServiceGetWithError(): void
    {
        try {
            ServicesApiTest::$api->entityServiceGet(1, 1, null, "name>123");
            Assert::fail();
        } catch (ApiException $e) {
            Assert::assertEquals(412, $e->getCode());
            Assert::assertNotNull($e->getResponseBody());
        }
    }

    /**
     * Проверка успешной обработки ответа сервера на получение услуги по ID
     */
    public function testEntityServiceIdGet()
    {
        $serviceReq = new Service();

        // простые флаги и строки
        $serviceReq->setArchived(true);
        $serviceReq->setName("Тестовая услуга " . StringUtil::randomUuid());
        $serviceReq->setCode(StringUtil::randomUuid());
        $serviceReq->setExternalCode(StringUtil::randomUuid());
        $serviceReq->setDescription("Описание тестовой услуги");
        $serviceReq->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
        $serviceReq->setTaxSystem(Service::TAX_SYSTEM_GENERAL_TAX_SYSTEM);
        $serviceReq->setSyncId(StringUtil::randomUuid());

        // налоги
        $serviceReq->setVat(20);
        $serviceReq->setVatEnabled(true);
        $serviceReq->setUseParentVat(false);
        $serviceReq->setEffectiveVat(20);
        $serviceReq->setEffectiveVatEnabled(true);

        $serviceReq->setDiscountProhibited(true);
        $serviceReq->setShared(false);

        // Price
        $buyPrice = new BuyPrice();
        $buyPrice->setValue(9999.0);
        $serviceReq->setBuyPrice($buyPrice);

        $minPrice = new \OpenAPI\Client\Model\MinPrice();
        $minPrice->setValue(1111.0);
        $serviceReq->setMinPrice($minPrice);

        // files
        $serviceReq->setFiles(new FileList());

        // barcodes
        $barcode = new Barcode();
        $barcode->setEan13("123123");
        $serviceReq->setBarcodes([$barcode]);

        $serviceResp = ServicesApiTest::$api->entityServicePost($serviceReq);
        $serviceId = $serviceResp->getId();
        Assert::assertNotNull($serviceId);
        Asserter::assertMeta($serviceResp->getMeta(), $serviceId, 'service');

        Assert::assertSame($serviceReq->getName(), $serviceResp->getName());
        Assert::assertSame($serviceReq->getCode(), $serviceResp->getCode());
        Assert::assertSame($serviceReq->getExternalCode(), $serviceResp->getExternalCode());
        Assert::assertSame($serviceReq->getDescription(), $serviceResp->getDescription());
        Assert::assertSame($serviceReq->getPaymentItemType(), $serviceResp->getPaymentItemType());
        Assert::assertSame($serviceReq->getTaxSystem(), $serviceResp->getTaxSystem());
        Assert::assertSame($serviceReq->getSyncId(), $serviceResp->getSyncId());

        Asserter::assertMetaCollection($serviceResp->getFiles()->getMeta(), "service/$serviceId/files", 0, 1000, 'files');
        Asserter::assertJsonHasFields($serviceResp, ['owner' => ['meta' => ['type' => 'employee']]], false);
        Asserter::assertJsonHasFields($serviceResp, ['group' => ['meta' => ['type' => 'group']]], false);
        Assert::assertNotNull($serviceResp->getUpdated());
        Assert::assertNotNull($serviceResp->getAccountId());

        Assert::assertSame($serviceReq->getVat(), $serviceResp->getVat());
        Assert::assertSame($serviceReq->getVatEnabled(), $serviceResp->getVatEnabled());
        Assert::assertSame($serviceReq->getUseParentVat(), $serviceResp->getUseParentVat());
        Assert::assertSame($serviceReq->getEffectiveVat(), $serviceResp->getEffectiveVat());
        Assert::assertSame($serviceReq->getEffectiveVatEnabled(), $serviceResp->getEffectiveVatEnabled());

        Assert::assertSame($serviceReq->getDiscountProhibited(), $serviceResp->getDiscountProhibited());
        Assert::assertSame($serviceReq->getShared(), $serviceResp->getShared());
        Assert::assertSame($serviceReq->getArchived(), $serviceResp->getArchived());

        Assert::assertSame($serviceReq->getBuyPrice()->getValue(), $serviceResp->getBuyPrice()->getValue());
        Assert::assertSame($serviceReq->getMinPrice()->getValue(), $serviceResp->getMinPrice()->getValue());

        Assert::assertSame($serviceReq->getBarcodes()[0]->getEan13(), $serviceResp->getBarcodes()[0]->getEan13());
    }

    /**
     * Проверка обработки ответа сервера на получение услуги сопровождаемое ошибкой
     */
    public function testEntityServiceIdGetWithError()
    {
        try {
            ServicesApiTest::$api->entityServiceIdGet(StringUtil::randomUuid());
            Assert::fail();
        } catch (ApiException $e) {
            Assert::assertEquals(404, $e->getCode());
            Assert::assertNotNull($e->getResponseBody());
        }
    }

    /**
     * Проверка обработки ответа сервера на создание услуги сопровождаемое ошибкой
     */
    public function testEntityServicePostWithError()
    {
        try {
            $service1 = new Service();
            ServicesApiTest::$api->entityServicePost($service1);
            Assert::fail();
        } catch (ApiException $e) {
            Assert::assertEquals(412, $e->getCode());
            Assert::assertNotNull($e->getResponseBody());
        }
    }

    /**
     * Проверка успешной обработки ответа сервера на обновление услуги
     */
    public function testEntityServiceIdPut()
    {
        $createService = new Service();
        $createService->setName("Service Old");
        $createService->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
        $createService = ServicesApiTest::$api->entityServicePost($createService);

        $updateService = new Service();
        $updateService->setName("Service New");
        $updateService->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_WORK);
        $updateService = ServicesApiTest::$api->entityServiceIdPut($createService->getId(), $updateService);

        Assert::assertSame($createService->getId(), $updateService->getId());
        Assert::assertSame("Service New", $updateService->getName());
        Assert::assertSame(Service::PAYMENT_ITEM_TYPE_WORK, $updateService->getPaymentItemType());
    }

    /**
     * Проверка обработки ответа сервера на обновление услуги сопровождаемое ошибкой
     */
    public function testEntityServiceIdPutWithError()
    {
        $service1 = new Service();
        $service1->setName("Service");
        $service1 = ServicesApiTest::$api->entityServicePost($service1);
        try {
            $updateService = new Service();
            $updateService->setName(true);
            ServicesApiTest::$api->entityServiceIdPut($service1->getId(), $updateService);
            Assert::fail();
        } catch (ApiException $e) {
            Assert::assertEquals(400, $e->getCode());
            Assert::assertNotNull($e->getResponseBody());
        }
    }

    /**
     * Проверка успешной обработки ответа сервера удаления услуги
     */
    public function testEntityServiceIdDelete()
    {
        $service = new Service();
        $service->setName("Service");
        $service->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
        $service = ServicesApiTest::$api->entityServicePost($service);
        $resp = ServicesApiTest::$api->entityServiceIdDeleteWithHttpInfo($service->getId());
        Assert::assertEquals(200, $resp[1]);
    }

    /**
     * Проверка обработки ответа сервера удаления услуги сопровождаемое ошибкой
     */
    public function testEntityServiceIdDeleteWithError()
    {
        try {
            ServicesApiTest::$api->entityServiceIdDelete(StringUtil::randomUuid());
            Assert::fail();
        } catch (ApiException $e) {
            Assert::assertEquals(404, $e->getCode());
            Assert::assertNotNull($e->getResponseBody());
        }
    }

    /**
     * Тест массового создания услуг
     */
    public function testBatchCreateServices(): void
    {
        $prefix = StringUtil::randomUuid();
        $services = [];

        for ($i = 1; $i <= 3; $i++) {
            $service = new Service();
            $service->setName("$prefix Batch Service $i");
            $service->setCode("Batch-$i-$prefix");
            $service->setDescription("Описание массовой услуги $i");
            $service->setVat(20);
            $service->setVatEnabled(true);
            $service->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
            $service->setTaxSystem(Service::TAX_SYSTEM_GENERAL_TAX_SYSTEM);
            $services[] = $service;
        }

        $response = ServicesApiTest::$api->entityServiceBatchPost($services);

        Assert::assertIsArray($response);
        Assert::assertCount(3, $response);

        foreach ($response as $index => $createdService) {
            Assert::assertInstanceOf(Service::class, $createdService);
            Assert::assertNotNull($createdService->getId());
            Asserter::assertStringContainsString("$prefix Batch Service " . ($index + 1), $createdService->getName());
            Asserter::assertStringContainsString("Batch-" . ($index + 1) . "-$prefix", $createdService->getCode());
            Asserter::assertStringContainsString("Описание массовой услуги " . ($index + 1), $createdService->getDescription());
            Assert::assertEquals(20, $createdService->getVat());
            Assert::assertTrue($createdService->getVatEnabled());
            Assert::assertEquals(Service::PAYMENT_ITEM_TYPE_SERVICE, $createdService->getPaymentItemType());
            Assert::assertEquals(Service::TAX_SYSTEM_GENERAL_TAX_SYSTEM, $createdService->getTaxSystem());

            Asserter::assertMeta($createdService->getMeta(), $createdService->getId(), 'service');
        }
    }

    /**
     * Тест массового обновления услуг
     */
    public function testBatchUpdateServices(): void
    {
        $prefix = StringUtil::randomUuid();
        $createdServices = [];

        for ($i = 1; $i <= 3; $i++) {
            $service = new Service();
            $service->setName("$prefix Original Service $i");
            $service->setCode("ORIG-$i-$prefix");
            $service->setVat(20);
            $service->setVatEnabled(true);
            $service->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
            $service->setTaxSystem(Service::TAX_SYSTEM_GENERAL_TAX_SYSTEM);
            $createdServices[] = $service;
        }

        $response = ServicesApiTest::$api->entityServiceBatchPost($createdServices);
        Assert::assertCount(3, $response);

        $updatedServices = [];
        foreach ($response as $index => $createdService) {
            $updateService = new Service();
            $updateService->setMeta($createdService->getMeta());
            $updateService->setName("$prefix Updated Service " . ($index + 1));
            $updateService->setCode("UPD-" . ($index + 1) . "-$prefix");
            $updateService->setDescription("Обновленное описание услуги " . ($index + 1));
            $updateService->setVat(10); // Изменяем НДС
            $updateService->setVatEnabled(true);
            $updateService->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_WORK);
            $updateService->setTaxSystem(Service::TAX_SYSTEM_SIMPLIFIED_TAX_SYSTEM_INCOME);
            $updatedServices[] = $updateService;
        }

        $updateResponse = ServicesApiTest::$api->entityServiceBatchPost($updatedServices);

        Assert::assertIsArray($updateResponse);
        Assert::assertCount(3, $updateResponse);

        foreach ($updateResponse as $index => $updatedService) {
            Assert::assertInstanceOf(Service::class, $updatedService);
            Asserter::assertStringContainsString("$prefix Updated Service " . ($index + 1), $updatedService->getName());
            Asserter::assertStringContainsString("UPD-" . ($index + 1) . "-$prefix", $updatedService->getCode());
            Asserter::assertStringContainsString("Обновленное описание услуги " . ($index + 1), $updatedService->getDescription());
            Assert::assertEquals(10, $updatedService->getVat()); // Проверяем измененный НДС
            Assert::assertEquals(Service::PAYMENT_ITEM_TYPE_WORK, $updatedService->getPaymentItemType());
        }
    }

    /**
     * Тест массового удаления услуг
     */
    public function testBatchDeleteServices(): void
    {
        $prefix = StringUtil::randomUuid();
        $createdServices = [];

        for ($i = 1; $i <= 3; $i++) {
            $service = new Service();
            $service->setName("$prefix Delete Service $i");
            $service->setCode("DEL-$i-$prefix");
            $service->setVat(20);
            $service->setVatEnabled(true);
            $service->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
            $service->setTaxSystem(Service::TAX_SYSTEM_GENERAL_TAX_SYSTEM);
            $createdServices[] = $service;
        }

        $response = ServicesApiTest::$api->entityServiceBatchPost($createdServices);
        Assert::assertCount(3, $response);

        $metaArray = [];
        foreach ($response as $createdService) {
            $meta = new Service();
            $meta->setMeta($createdService->getMeta());
            $metaArray[] = $meta;
        }

        $deleteResponse = ServicesApiTest::$api->entityServiceDeletePost($metaArray);

        Assert::assertIsArray($deleteResponse);
        Assert::assertCount(3, $deleteResponse);

        foreach ($deleteResponse as $deleteResult) {
            Assert::assertInstanceOf(DeleteInfo::class, $deleteResult);
            Assert::assertNotNull($deleteResult->getInfo());
            Asserter::assertStringContainsString('удален', $deleteResult->getInfo());
        }

        foreach ($response as $createdService) {
            try {
                ServicesApiTest::$api->entityServiceIdGet($createdService->getId());
                Assert::fail('Услуга должна была быть удалена');
            } catch (ApiException $e) {
                Assert::assertEquals(404, $e->getCode());
            }
        }
    }

    /**
     * Тест массового создания услуг с дублирующимися кодами
     */
    public function testBatchCreateServicesWithError(): void
    {
        $prefix = StringUtil::randomUuid();
        $duplicateCode = "DUPLICATE-$prefix";
        $services = [];

        for ($i = 1; $i <= 3; $i++) {
            $service = new Service();
            $service->setName("$prefix Duplicate Service $i");
            $service->setCode($duplicateCode); // Одинаковый код для всех услуг
            $service->setVat(20);
            $service->setVatEnabled(true);
            $service->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
            $service->setTaxSystem(Service::TAX_SYSTEM_GENERAL_TAX_SYSTEM);
            $services[] = $service;
        }

        try {
            $res = ServicesApiTest::$api->entityServiceBatchPost($services);
        } catch (ApiException $e) {
            $res = json_decode($e->getResponseBody(), true);
        }

        $success = 0;
        $errors = 0;
        foreach ($res as $item) {
            if (isset($item['errors'])) {
                $errors++;
                Assert::assertEquals(3006, $item['errors'][0]['code']);
            } else {
                $success++;
                Assert::assertEquals($duplicateCode, $item['code']);
            }
        }

        Assert::assertSame(1, $success, 'Ожидается 1 успешное создание');
        Assert::assertSame(2, $errors, 'Ожидается 2 ошибки');
    }

    /**
     * Тест массового удаления услуг с некорректными мета-данными
     */
    public function testBatchDeleteServicesWithError(): void
    {
        $prefix = StringUtil::randomUuid();

        $service = new Service();
        $service->setName("$prefix Delete Service");
        $service->setCode("DEL-$prefix");
        $service->setVat(20);
        $service->setVatEnabled(true);
        $service->setPaymentItemType(Service::PAYMENT_ITEM_TYPE_SERVICE);
        $service->setTaxSystem(Service::TAX_SYSTEM_GENERAL_TAX_SYSTEM);

        $response = ServicesApiTest::$api->entityServicePost($service);

        $metaArray = [];

        $meta1 = new Service();
        $meta1->setMeta($response->getMeta());
        $metaArray[] = $meta1;

        // Мета-данные с некорректным ID
        $meta2 = new Service();
        $metaInvalidId = clone $response->getMeta();
        $newHref = preg_replace(
            '/[0-9a-fA-F-]{36}/',
            'invalid-uuid',
            $metaInvalidId->getHref()
        );
        $metaInvalidId->setHref($newHref);

        $meta2->setMeta($metaInvalidId);
        $metaArray[] = $meta2;

        // Мета-данные с некорректным типом
        $meta3 = new Service();
        $metaInvalidType = clone $response->getMeta();
        $newHref2 = str_replace('/service/', '/counterparty/', $metaInvalidType->getHref());
        $newHref2 = preg_replace(
            '/[0-9a-fA-F-]{36}/',
            'invalid-uuid',
            $newHref2
        );
        $metaInvalidType->setHref($newHref2);
        $meta3->setMeta($metaInvalidType);
        $metaArray[] = $meta3;

        try {
            $res = ServicesApiTest::$api->entityServiceDeletePost($metaArray);
            Assert::fail('Ожидалось исключение ApiException из-за некорректных мета-данных');
        } catch (ApiException $e) {
            $res = json_decode($e->getResponseBody(), true);
        }

        $success = 0;
        $errors = 0;
        foreach ($res as $item) {
            if (isset($item['errors'])) {
                $errors++;
                Assert::assertEquals(2013, $item['errors'][0]['code']);
            } else {
                $success++;
                Asserter::assertStringContainsString('удален', $item['info']);
            }
        }

        Assert::assertSame(1, $success, 'Ожидается 1 успешное удаление');
        Assert::assertSame(2, $errors, 'Ожидается 2 ошибки');
    }

    /**
     * Тест массового удаления услуг с пустым массивом
     */
    public function testBatchDeleteServicesWithEmptyArray(): void
    {
        try {
            ServicesApiTest::$api->entityServiceDeletePost([]);
            Assert::fail('Ожидалось исключение InvalidArgumentException для пустого массива');
        } catch (\InvalidArgumentException $e) {
            Asserter::assertStringContainsString('Missing the required parameter', $e->getMessage());
        }
    }
}