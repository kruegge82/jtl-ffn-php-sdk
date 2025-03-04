# kruegge82\jtlffn\WarehousesApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**warehousesDelete()**](WarehousesApi.md#warehousesDelete) | **DELETE** /api/v1/fulfiller/warehouses/{warehouseId} | Delete |
| [**warehousesGet()**](WarehousesApi.md#warehousesGet) | **GET** /api/v1/fulfiller/warehouses/{warehouseId} | Get |
| [**warehousesGetAll()**](WarehousesApi.md#warehousesGetAll) | **GET** /api/v1/fulfiller/warehouses | Get All |
| [**warehousesGetUpdates()**](WarehousesApi.md#warehousesGetUpdates) | **GET** /api/v1/fulfiller/warehouses/updates | Get Updates |
| [**warehousesPost()**](WarehousesApi.md#warehousesPost) | **POST** /api/v1/fulfiller/warehouses | Post |
| [**warehousesUpdate()**](WarehousesApi.md#warehousesUpdate) | **PATCH** /api/v1/fulfiller/warehouses/{warehouseId} | Update |


## `warehousesDelete()`

```php
warehousesDelete($warehouse_id)
```

Delete

Delete a warehouse

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\WarehousesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier

try {
    $apiInstance->warehousesDelete($warehouse_id);
} catch (Exception $e) {
    echo 'Exception when calling WarehousesApi->warehousesDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **warehouse_id** | **string**| Warehouse identifier | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `warehousesGet()`

```php
warehousesGet($warehouse_id): \kruegge82\jtlffn\Model\Warehouse
```

Get

Get a specific warehouse

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\WarehousesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier

try {
    $result = $apiInstance->warehousesGet($warehouse_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WarehousesApi->warehousesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **warehouse_id** | **string**| Warehouse identifier | |

### Return type

[**\kruegge82\jtlffn\Model\Warehouse**](../Model/Warehouse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `warehousesGetAll()`

```php
warehousesGetAll($top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedWarehouseResponse
```

Get All

Get all your warehouses

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\WarehousesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'warehouseId', 'fulfillerId', 'name', 'address/lastname', 'address/company', 'address/city', 'address/email'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->warehousesGetAll($top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WarehousesApi->warehousesGetAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;warehouseId&#39;, &#39;fulfillerId&#39;, &#39;name&#39;, &#39;address/lastname&#39;, &#39;address/company&#39;, &#39;address/city&#39;, &#39;address/email&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedWarehouseResponse**](../Model/PagedWarehouseResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `warehousesGetUpdates()`

```php
warehousesGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentWarehouseList
```

Get Updates

Query warehouses for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\WarehousesApi(
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
    $result = $apiInstance->warehousesGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WarehousesApi->warehousesGetUpdates: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentWarehouseList**](../Model/RecentWarehouseList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `warehousesPost()`

```php
warehousesPost($create_warehouse_request): \kruegge82\jtlffn\Model\Warehouse
```

Post

Create a new warehouse

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\WarehousesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$create_warehouse_request = new \kruegge82\jtlffn\Model\CreateWarehouseRequest(); // \kruegge82\jtlffn\Model\CreateWarehouseRequest | Details of the warehouse you want to create

try {
    $result = $apiInstance->warehousesPost($create_warehouse_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WarehousesApi->warehousesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_warehouse_request** | [**\kruegge82\jtlffn\Model\CreateWarehouseRequest**](../Model/CreateWarehouseRequest.md)| Details of the warehouse you want to create | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\Warehouse**](../Model/Warehouse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `warehousesUpdate()`

```php
warehousesUpdate($warehouse_id, $update_warehouse_request)
```

Update

Update information of an existing warehouse

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\WarehousesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier
$update_warehouse_request = new \kruegge82\jtlffn\Model\UpdateWarehouseRequest(); // \kruegge82\jtlffn\Model\UpdateWarehouseRequest | Your warehouse will be updated with that details

try {
    $apiInstance->warehousesUpdate($warehouse_id, $update_warehouse_request);
} catch (Exception $e) {
    echo 'Exception when calling WarehousesApi->warehousesUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **warehouse_id** | **string**| Warehouse identifier | |
| **update_warehouse_request** | [**\kruegge82\jtlffn\Model\UpdateWarehouseRequest**](../Model/UpdateWarehouseRequest.md)| Your warehouse will be updated with that details | [optional] |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
