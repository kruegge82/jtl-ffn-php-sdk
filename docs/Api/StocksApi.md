# kruegge82\jtlffn\StocksApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**stocksGetRecentStockChanges()**](StocksApi.md#stocksGetRecentStockChanges) | **GET** /api/v1/fulfiller/stocks/updates | Get Recent Stock Changes Updates |
| [**stocksGetStock()**](StocksApi.md#stocksGetStock) | **GET** /api/v1/fulfiller/stocks/{jfsku} | Get Stock |
| [**stocksGetStockChangesAll()**](StocksApi.md#stocksGetStockChangesAll) | **GET** /api/v1/fulfiller/stocks/changes | Get Stock Changes All |
| [**stocksGetStockChangesInWarehouseAll()**](StocksApi.md#stocksGetStockChangesInWarehouseAll) | **GET** /api/v1/fulfiller/stocks/changes/{warehouseId} | Get Stock Changes In Warehouse All |
| [**stocksGetStockInWarehouse()**](StocksApi.md#stocksGetStockInWarehouse) | **GET** /api/v1/fulfiller/stocks/{jfsku}/{warehouseId} | Get Stock In Warehouse |
| [**stocksGetStocksAll()**](StocksApi.md#stocksGetStocksAll) | **GET** /api/v1/fulfiller/stocks | Get Stocks All |
| [**stocksGetStocksInWarehouseAll()**](StocksApi.md#stocksGetStocksInWarehouseAll) | **GET** /api/v1/fulfiller/stocks/warehouse/{warehouseId} | Get Stocks In Warehouse All |
| [**stocksPostAdjustment()**](StocksApi.md#stocksPostAdjustment) | **POST** /api/v1/fulfiller/stocks/adjustments | Post Adjustment |


## `stocksGetRecentStockChanges()`

```php
stocksGetRecentStockChanges($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentStockChangeList
```

Get Recent Stock Changes Updates

Query stock changes for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\StocksApi(
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
    $result = $apiInstance->stocksGetRecentStockChanges($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->stocksGetRecentStockChanges: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentStockChangeList**](../Model/RecentStockChangeList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `stocksGetStock()`

```php
stocksGetStock($jfsku, $date, $top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\Stock
```

Get Stock

Get stock information for a specific product

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$jfsku = 'jfsku_example'; // string | Product identifer
$date = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | 
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               </br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->stocksGetStock($jfsku, $date, $top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->stocksGetStock: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jfsku** | **string**| Product identifer | |
| **date** | **\DateTime**|  | [optional] |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\Stock**](../Model/Stock.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `stocksGetStockChangesAll()`

```php
stocksGetStockChangesAll($date, $top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedStockChangeWithProductResponse
```

Get Stock Changes All

Get all stock changes

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$date = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | 
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'fulfillerStockChangeId', 'fulfillerTimestamp', 'stockLevel', 'stockLevelReserved', 'stockLevelBlocked', 'quantity', 'quantityReserved', 'quantityBlocked', 'quantityAnnounced', 'stockLevelAnnounced', 'changeType', 'current', 'stockChangeId/warehouseId', 'stockChangeId/jfsku', 'inboundItem/inboundId', 'outboundItem/outboundId', 'outboundShippingNotificationItem/outboundShippingNotificationId'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->stocksGetStockChangesAll($date, $top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->stocksGetStockChangesAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **date** | **\DateTime**|  | [optional] |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;fulfillerStockChangeId&#39;, &#39;fulfillerTimestamp&#39;, &#39;stockLevel&#39;, &#39;stockLevelReserved&#39;, &#39;stockLevelBlocked&#39;, &#39;quantity&#39;, &#39;quantityReserved&#39;, &#39;quantityBlocked&#39;, &#39;quantityAnnounced&#39;, &#39;stockLevelAnnounced&#39;, &#39;changeType&#39;, &#39;current&#39;, &#39;stockChangeId/warehouseId&#39;, &#39;stockChangeId/jfsku&#39;, &#39;inboundItem/inboundId&#39;, &#39;outboundItem/outboundId&#39;, &#39;outboundShippingNotificationItem/outboundShippingNotificationId&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedStockChangeWithProductResponse**](../Model/PagedStockChangeWithProductResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `stocksGetStockChangesInWarehouseAll()`

```php
stocksGetStockChangesInWarehouseAll($warehouse_id, $date, $top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedStockChangeResponse
```

Get Stock Changes In Warehouse All

Get stock changes in a specific warehouse

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier
$date = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | 
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'fulfillerStockChangeId', 'fulfillerTimestamp', 'stockLevel', 'stockLevelReserved', 'stockLevelBlocked', 'stockLevelAnnounced', 'quantity', 'quantityReserved', 'quantityBlocked', 'quantityAnnounced', 'changeType', 'stockChangeId/warehouseId', 'stockChangeId/jfsku', 'inboundItem/inboundId', 'outboundItem/outboundId', 'outboundShippingNotificationItem/outboundShippingNotificationId'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->stocksGetStockChangesInWarehouseAll($warehouse_id, $date, $top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->stocksGetStockChangesInWarehouseAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **warehouse_id** | **string**| Warehouse identifier | |
| **date** | **\DateTime**|  | [optional] |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;fulfillerStockChangeId&#39;, &#39;fulfillerTimestamp&#39;, &#39;stockLevel&#39;, &#39;stockLevelReserved&#39;, &#39;stockLevelBlocked&#39;, &#39;stockLevelAnnounced&#39;, &#39;quantity&#39;, &#39;quantityReserved&#39;, &#39;quantityBlocked&#39;, &#39;quantityAnnounced&#39;, &#39;changeType&#39;, &#39;stockChangeId/warehouseId&#39;, &#39;stockChangeId/jfsku&#39;, &#39;inboundItem/inboundId&#39;, &#39;outboundItem/outboundId&#39;, &#39;outboundShippingNotificationItem/outboundShippingNotificationId&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedStockChangeResponse**](../Model/PagedStockChangeResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `stocksGetStockInWarehouse()`

```php
stocksGetStockInWarehouse($jfsku, $warehouse_id, $date): \kruegge82\jtlffn\Model\StockInWarehouse
```

Get Stock In Warehouse

Get stock information for a specific product in a specific warehouse

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$jfsku = 'jfsku_example'; // string | Product identifer
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier
$date = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | 

try {
    $result = $apiInstance->stocksGetStockInWarehouse($jfsku, $warehouse_id, $date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->stocksGetStockInWarehouse: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jfsku** | **string**| Product identifer | |
| **warehouse_id** | **string**| Warehouse identifier | |
| **date** | **\DateTime**|  | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\StockInWarehouse**](../Model/StockInWarehouse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `stocksGetStocksAll()`

```php
stocksGetStocksAll($date, $top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedStockResponse
```

Get Stocks All

Get stock information of all products in all warehouses

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$date = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | 
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'stockLevel', 'stockLevelAnnounced', 'stockLevelReserved', 'stockLevelBlocked', 'stockReservedDetails/outboundId', 'stockAnnouncedDetails/inboundId', 'warehouses/warehouseId', 'warehouses/stockLevel', 'warehouses/stockLevelAnnounced', 'warehouses/stockLevelReserved', 'warehouses/stockLevelBlocked', 'warehouses/stockReservedDetails/outboundId', 'warehouses/stockAnnouncedDetails/inboundId'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->stocksGetStocksAll($date, $top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->stocksGetStocksAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **date** | **\DateTime**|  | [optional] |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;stockLevel&#39;, &#39;stockLevelAnnounced&#39;, &#39;stockLevelReserved&#39;, &#39;stockLevelBlocked&#39;, &#39;stockReservedDetails/outboundId&#39;, &#39;stockAnnouncedDetails/inboundId&#39;, &#39;warehouses/warehouseId&#39;, &#39;warehouses/stockLevel&#39;, &#39;warehouses/stockLevelAnnounced&#39;, &#39;warehouses/stockLevelReserved&#39;, &#39;warehouses/stockLevelBlocked&#39;, &#39;warehouses/stockReservedDetails/outboundId&#39;, &#39;warehouses/stockAnnouncedDetails/inboundId&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedStockResponse**](../Model/PagedStockResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `stocksGetStocksInWarehouseAll()`

```php
stocksGetStocksInWarehouseAll($warehouse_id, $date, $top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedStockInWarehouseResponse
```

Get Stocks In Warehouse All

Get stock information in a specific warehouse

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier
$date = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | 
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'warehouseId', 'stockLevel', 'stockLevelAnnounced', 'stockLevelReserved', 'stockLevelBlocked', 'stockReservedDetails/outboundId', 'stockAnnouncedDetails/inboundId'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->stocksGetStocksInWarehouseAll($warehouse_id, $date, $top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->stocksGetStocksInWarehouseAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **warehouse_id** | **string**| Warehouse identifier | |
| **date** | **\DateTime**|  | [optional] |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;warehouseId&#39;, &#39;stockLevel&#39;, &#39;stockLevelAnnounced&#39;, &#39;stockLevelReserved&#39;, &#39;stockLevelBlocked&#39;, &#39;stockReservedDetails/outboundId&#39;, &#39;stockAnnouncedDetails/inboundId&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedStockInWarehouseResponse**](../Model/PagedStockInWarehouseResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `stocksPostAdjustment()`

```php
stocksPostAdjustment($create_stock_adjustment_request): \kruegge82\jtlffn\Model\StockChange
```

Post Adjustment

Adjust the stock of a product. Use this call as an exeptional way to change stock, for example if a lost product was found or a product has been destroyed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$create_stock_adjustment_request = new \kruegge82\jtlffn\Model\CreateStockAdjustmentRequest(); // \kruegge82\jtlffn\Model\CreateStockAdjustmentRequest | The stock adjustment you want to perform

try {
    $result = $apiInstance->stocksPostAdjustment($create_stock_adjustment_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->stocksPostAdjustment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_stock_adjustment_request** | [**\kruegge82\jtlffn\Model\CreateStockAdjustmentRequest**](../Model/CreateStockAdjustmentRequest.md)| The stock adjustment you want to perform | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\StockChange**](../Model/StockChange.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
