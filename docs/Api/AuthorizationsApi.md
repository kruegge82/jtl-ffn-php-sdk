# kruegge82\jtlffn\AuthorizationsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**authorizationsDeleteShippingMethodAuthorization()**](AuthorizationsApi.md#authorizationsDeleteShippingMethodAuthorization) | **DELETE** /api/v1/fulfiller/authorizations/{merchantId}/warehouses/{warehouseId}/shippingMethods/{shippingMethodId} | Delete Shipping Method Authorization |
| [**authorizationsDeleteWarehouseAuthorization()**](AuthorizationsApi.md#authorizationsDeleteWarehouseAuthorization) | **DELETE** /api/v1/fulfiller/authorizations/{merchantId}/warehouses/{warehouseId} | Delete Warehouse Authorization |
| [**authorizationsGet()**](AuthorizationsApi.md#authorizationsGet) | **GET** /api/v1/fulfiller/authorizations/{merchantId} | Get |
| [**authorizationsGetAll()**](AuthorizationsApi.md#authorizationsGetAll) | **GET** /api/v1/fulfiller/authorizations | Get All |
| [**authorizationsGetUpdates()**](AuthorizationsApi.md#authorizationsGetUpdates) | **GET** /api/v1/fulfiller/authorizations/updates | Get Updates |
| [**authorizationsPostShippingMethodAuthorization()**](AuthorizationsApi.md#authorizationsPostShippingMethodAuthorization) | **POST** /api/v1/fulfiller/authorizations/{merchantId}/warehouses/{warehouseId}/shippingMethods | Post Shipping Method Authorization |
| [**authorizationsPostWarehouseAuthorization()**](AuthorizationsApi.md#authorizationsPostWarehouseAuthorization) | **POST** /api/v1/fulfiller/authorizations/{merchantId}/warehouses | Post Warehouse Authorization |


## `authorizationsDeleteShippingMethodAuthorization()`

```php
authorizationsDeleteShippingMethodAuthorization($merchant_id, $warehouse_id, $shipping_method_id)
```

Delete Shipping Method Authorization

Delete available shipping methods for a merchant / warehouse combination

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\AuthorizationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$merchant_id = 'merchant_id_example'; // string | Merchant identifier
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier
$shipping_method_id = 'shipping_method_id_example'; // string | Includes shipping methods that shall be deleted

try {
    $apiInstance->authorizationsDeleteShippingMethodAuthorization($merchant_id, $warehouse_id, $shipping_method_id);
} catch (Exception $e) {
    echo 'Exception when calling AuthorizationsApi->authorizationsDeleteShippingMethodAuthorization: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **merchant_id** | **string**| Merchant identifier | |
| **warehouse_id** | **string**| Warehouse identifier | |
| **shipping_method_id** | **string**| Includes shipping methods that shall be deleted | |

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

## `authorizationsDeleteWarehouseAuthorization()`

```php
authorizationsDeleteWarehouseAuthorization($merchant_id, $warehouse_id)
```

Delete Warehouse Authorization

Delete a warehouse authorization from a merchant

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\AuthorizationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$merchant_id = 'merchant_id_example'; // string | Merchant identifier
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier

try {
    $apiInstance->authorizationsDeleteWarehouseAuthorization($merchant_id, $warehouse_id);
} catch (Exception $e) {
    echo 'Exception when calling AuthorizationsApi->authorizationsDeleteWarehouseAuthorization: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **merchant_id** | **string**| Merchant identifier | |
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

## `authorizationsGet()`

```php
authorizationsGet($merchant_id): \kruegge82\jtlffn\Model\Authorization
```

Get

Get warehouse authorizations of a specific merchant

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\AuthorizationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$merchant_id = 'merchant_id_example'; // string | Merchant identifier

try {
    $result = $apiInstance->authorizationsGet($merchant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthorizationsApi->authorizationsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **merchant_id** | **string**| Merchant identifier | |

### Return type

[**\kruegge82\jtlffn\Model\Authorization**](../Model/Authorization.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `authorizationsGetAll()`

```php
authorizationsGetAll($top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedAuthorizationResponse
```

Get All

Get warehouse authorizations of all your merchants

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\AuthorizationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'merchantId', 'warehouses/warehouseId', 'warehouses/shippingMethods/shippingMethodId'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->authorizationsGetAll($top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthorizationsApi->authorizationsGetAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;merchantId&#39;, &#39;warehouses/warehouseId&#39;, &#39;warehouses/shippingMethods/shippingMethodId&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedAuthorizationResponse**](../Model/PagedAuthorizationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `authorizationsGetUpdates()`

```php
authorizationsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentAuthorizationList
```

Get Updates

Query authorizations for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\AuthorizationsApi(
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
    $result = $apiInstance->authorizationsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthorizationsApi->authorizationsGetUpdates: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentAuthorizationList**](../Model/RecentAuthorizationList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `authorizationsPostShippingMethodAuthorization()`

```php
authorizationsPostShippingMethodAuthorization($merchant_id, $warehouse_id, $shipping_method_authorization_request): \kruegge82\jtlffn\Model\Authorization
```

Post Shipping Method Authorization

Assign available shipping methods for a merchant / warehouse combination

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\AuthorizationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$merchant_id = 'merchant_id_example'; // string | Merchant identifier
$warehouse_id = 'warehouse_id_example'; // string | Warehouse identifier
$shipping_method_authorization_request = new \kruegge82\jtlffn\Model\ShippingMethodAuthorizationRequest(); // \kruegge82\jtlffn\Model\ShippingMethodAuthorizationRequest | Includes shipping methods that shall be available

try {
    $result = $apiInstance->authorizationsPostShippingMethodAuthorization($merchant_id, $warehouse_id, $shipping_method_authorization_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthorizationsApi->authorizationsPostShippingMethodAuthorization: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **merchant_id** | **string**| Merchant identifier | |
| **warehouse_id** | **string**| Warehouse identifier | |
| **shipping_method_authorization_request** | [**\kruegge82\jtlffn\Model\ShippingMethodAuthorizationRequest**](../Model/ShippingMethodAuthorizationRequest.md)| Includes shipping methods that shall be available | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\Authorization**](../Model/Authorization.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `authorizationsPostWarehouseAuthorization()`

```php
authorizationsPostWarehouseAuthorization($merchant_id, $warehouse_authorization_request): \kruegge82\jtlffn\Model\Authorization
```

Post Warehouse Authorization

Assign a warehouse authorization to a merchant

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\AuthorizationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$merchant_id = 'merchant_id_example'; // string | Merchant identifier
$warehouse_authorization_request = new \kruegge82\jtlffn\Model\WarehouseAuthorizationRequest(); // \kruegge82\jtlffn\Model\WarehouseAuthorizationRequest | Includes the warehouse id that shall be assigned

try {
    $result = $apiInstance->authorizationsPostWarehouseAuthorization($merchant_id, $warehouse_authorization_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthorizationsApi->authorizationsPostWarehouseAuthorization: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **merchant_id** | **string**| Merchant identifier | |
| **warehouse_authorization_request** | [**\kruegge82\jtlffn\Model\WarehouseAuthorizationRequest**](../Model/WarehouseAuthorizationRequest.md)| Includes the warehouse id that shall be assigned | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\Authorization**](../Model/Authorization.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
