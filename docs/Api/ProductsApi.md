# kruegge82\jtlffn\ProductsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**productsGet()**](ProductsApi.md#productsGet) | **GET** /api/v1/fulfiller/products/{jfsku} | Get |
| [**productsGetAll()**](ProductsApi.md#productsGetAll) | **GET** /api/v1/fulfiller/products | Get All |
| [**productsGetPicture()**](ProductsApi.md#productsGetPicture) | **GET** /api/v1/fulfiller/products/{jfsku}/pictures/{number} | Get Picture |
| [**productsGetPictureData()**](ProductsApi.md#productsGetPictureData) | **GET** /api/v1/fulfiller/products/{jfsku}/pictures/{number}/data | Get Picture Data |
| [**productsGetUpdates()**](ProductsApi.md#productsGetUpdates) | **GET** /api/v1/fulfiller/products/updates | Get Updates |
| [**productsPostRelated()**](ProductsApi.md#productsPostRelated) | **POST** /api/v1/fulfiller/products/{jfsku}/related-products/condition | Post Related |


## `productsGet()`

```php
productsGet($jfsku): \kruegge82\jtlffn\Model\Product
```

Get

Get a specific product

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$jfsku = 'jfsku_example'; // string | Product identifer

try {
    $result = $apiInstance->productsGet($jfsku);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jfsku** | **string**| Product identifer | |

### Return type

[**\kruegge82\jtlffn\Model\Product**](../Model/Product.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsGetAll()`

```php
productsGetAll($referenced_warehouse, $top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedProductResponse
```

Get All

Get all products from all your merchants

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$referenced_warehouse = 'referenced_warehouse_example'; // string | 
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'jfsku', 'merchantId', 'name', 'merchantSku', 'productGroup', 'manufacturer', 'condition', 'identifier/ean', 'identifier/isbn', 'identifier/upc', 'identifier/asin', 'identifier/mpn/manufacturer', 'identifier/mpn/partNumber', 'specifications/unNumber', 'specifications/hazardIdentifier', 'specifications/taric', 'specifications/fnsku', 'specifications/isBatch', 'specifications/isDivisible', 'specifications/isBestBefore', 'specifications/isSerialNumber', 'specifications/isBillOfMaterials', 'attributes/key', 'attributes/value', 'pictures/number', 'bundles/ean', 'bundles/upc', 'statistics/incomingGoods', 'statistics/outgoingGoods', 'statistics/outgoingGoodsLast30', 'statistics/outgoingGoodsLast365', 'statistics/outgoingGoods30To60', 'statistics/averageInventory', 'statistics/inventoryTurnover', 'statistics/rangesOfCoverage', 'stock/stockLevel', 'stock/stockLevelAnnounced', 'stock/stockLevelReserved', 'stock/stockLevelBlocked', 'stock/stockReservedDetails/outboundId', 'stock/stockAnnouncedDetails/inboundId', 'stock/warehouses/warehouseId', 'stock/warehouses/stockLevel', 'stock/warehouses/stockLevelAnnounced', 'stock/warehouses/stockLevelReserved', 'stock/warehouses/stockLevelBlocked', 'stock/warehouses/stockReservedDetails/outboundId', 'stock/warehouses/stockAnnouncedDetails/inboundId', 'relatedProducts/jfsku', 'relatedProducts/condition', 'identifier'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->productsGetAll($referenced_warehouse, $top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsGetAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **referenced_warehouse** | **string**|  | [optional] |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;jfsku&#39;, &#39;merchantId&#39;, &#39;name&#39;, &#39;merchantSku&#39;, &#39;productGroup&#39;, &#39;manufacturer&#39;, &#39;condition&#39;, &#39;identifier/ean&#39;, &#39;identifier/isbn&#39;, &#39;identifier/upc&#39;, &#39;identifier/asin&#39;, &#39;identifier/mpn/manufacturer&#39;, &#39;identifier/mpn/partNumber&#39;, &#39;specifications/unNumber&#39;, &#39;specifications/hazardIdentifier&#39;, &#39;specifications/taric&#39;, &#39;specifications/fnsku&#39;, &#39;specifications/isBatch&#39;, &#39;specifications/isDivisible&#39;, &#39;specifications/isBestBefore&#39;, &#39;specifications/isSerialNumber&#39;, &#39;specifications/isBillOfMaterials&#39;, &#39;attributes/key&#39;, &#39;attributes/value&#39;, &#39;pictures/number&#39;, &#39;bundles/ean&#39;, &#39;bundles/upc&#39;, &#39;statistics/incomingGoods&#39;, &#39;statistics/outgoingGoods&#39;, &#39;statistics/outgoingGoodsLast30&#39;, &#39;statistics/outgoingGoodsLast365&#39;, &#39;statistics/outgoingGoods30To60&#39;, &#39;statistics/averageInventory&#39;, &#39;statistics/inventoryTurnover&#39;, &#39;statistics/rangesOfCoverage&#39;, &#39;stock/stockLevel&#39;, &#39;stock/stockLevelAnnounced&#39;, &#39;stock/stockLevelReserved&#39;, &#39;stock/stockLevelBlocked&#39;, &#39;stock/stockReservedDetails/outboundId&#39;, &#39;stock/stockAnnouncedDetails/inboundId&#39;, &#39;stock/warehouses/warehouseId&#39;, &#39;stock/warehouses/stockLevel&#39;, &#39;stock/warehouses/stockLevelAnnounced&#39;, &#39;stock/warehouses/stockLevelReserved&#39;, &#39;stock/warehouses/stockLevelBlocked&#39;, &#39;stock/warehouses/stockReservedDetails/outboundId&#39;, &#39;stock/warehouses/stockAnnouncedDetails/inboundId&#39;, &#39;relatedProducts/jfsku&#39;, &#39;relatedProducts/condition&#39;, &#39;identifier&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedProductResponse**](../Model/PagedProductResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsGetPicture()`

```php
productsGetPicture($jfsku, $number): \kruegge82\jtlffn\Model\PictureData
```

Get Picture

Get a picture from a product

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$jfsku = 'jfsku_example'; // string | Product identifer
$number = 56; // int | Number of the picture. A Product can have several pictures

try {
    $result = $apiInstance->productsGetPicture($jfsku, $number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsGetPicture: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jfsku** | **string**| Product identifer | |
| **number** | **int**| Number of the picture. A Product can have several pictures | |

### Return type

[**\kruegge82\jtlffn\Model\PictureData**](../Model/PictureData.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsGetPictureData()`

```php
productsGetPictureData($jfsku, $number): \SplFileObject
```

Get Picture Data

Get a specific picture from a product

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$jfsku = 'jfsku_example'; // string | Product identifer
$number = 56; // int | The number of the picture you want to receive

try {
    $result = $apiInstance->productsGetPictureData($jfsku, $number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsGetPictureData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jfsku** | **string**| Product identifer | |
| **number** | **int**| The number of the picture you want to receive | |

### Return type

**\SplFileObject**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsGetUpdates()`

```php
productsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentProductList
```

Get Updates

Query products for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$from_date = 'from_date_example'; // string | The start date of the timeframe.
$to_date = 'to_date_example'; // string | The end date of the timeframe.
$page = 1; // int | Page number.
$ignore_own_application_id = false; // bool | If true, modifications from your own application-id will not be returned
$ignore_own_user_id = false; // bool | If true, modifications from your own user-id will not be returned

try {
    $result = $apiInstance->productsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsGetUpdates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from_date** | **string**| The start date of the timeframe. | [optional] |
| **to_date** | **string**| The end date of the timeframe. | [optional] |
| **page** | **int**| Page number. | [optional] [default to 1] |
| **ignore_own_application_id** | **bool**| If true, modifications from your own application-id will not be returned | [optional] [default to false] |
| **ignore_own_user_id** | **bool**| If true, modifications from your own user-id will not be returned | [optional] [default to false] |

### Return type

[**\kruegge82\jtlffn\Model\RecentProductList**](../Model/RecentProductList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productsPostRelated()`

```php
productsPostRelated($jfsku, $create_related_product_request): \kruegge82\jtlffn\Model\Product
```

Post Related

Create a new product with a condition with a relation to given jfsku

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$jfsku = 'jfsku_example'; // string | 
$create_related_product_request = new \kruegge82\jtlffn\Model\CreateRelatedProductRequest(); // \kruegge82\jtlffn\Model\CreateRelatedProductRequest | Product details

try {
    $result = $apiInstance->productsPostRelated($jfsku, $create_related_product_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productsPostRelated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jfsku** | **string**|  | |
| **create_related_product_request** | [**\kruegge82\jtlffn\Model\CreateRelatedProductRequest**](../Model/CreateRelatedProductRequest.md)| Product details | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\Product**](../Model/Product.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
