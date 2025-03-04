# kruegge82\jtlffn\ShippingMethodsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**shippingMethodsDelete()**](ShippingMethodsApi.md#shippingMethodsDelete) | **DELETE** /api/v1/fulfiller/shippingmethods/{shippingMethodId} | Delete |
| [**shippingMethodsGet()**](ShippingMethodsApi.md#shippingMethodsGet) | **GET** /api/v1/fulfiller/shippingmethods/{shippingMethodId} | Get |
| [**shippingMethodsGetAll()**](ShippingMethodsApi.md#shippingMethodsGetAll) | **GET** /api/v1/fulfiller/shippingmethods | Get All |
| [**shippingMethodsGetUpdates()**](ShippingMethodsApi.md#shippingMethodsGetUpdates) | **GET** /api/v1/fulfiller/shippingmethods/updates | Get Updates |
| [**shippingMethodsPost()**](ShippingMethodsApi.md#shippingMethodsPost) | **POST** /api/v1/fulfiller/shippingmethods | Post |
| [**shippingMethodsUpdate()**](ShippingMethodsApi.md#shippingMethodsUpdate) | **PATCH** /api/v1/fulfiller/shippingmethods/{shippingMethodId} | Update |


## `shippingMethodsDelete()`

```php
shippingMethodsDelete($shipping_method_id)
```

Delete

Delete a shipping method

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ShippingMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$shipping_method_id = 'shipping_method_id_example'; // string | Shipping method identifier

try {
    $apiInstance->shippingMethodsDelete($shipping_method_id);
} catch (Exception $e) {
    echo 'Exception when calling ShippingMethodsApi->shippingMethodsDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipping_method_id** | **string**| Shipping method identifier | |

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

## `shippingMethodsGet()`

```php
shippingMethodsGet($shipping_method_id): \kruegge82\jtlffn\Model\ShippingMethod
```

Get

Get a specific shipping method

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ShippingMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$shipping_method_id = 'shipping_method_id_example'; // string | Shipping method identifier

try {
    $result = $apiInstance->shippingMethodsGet($shipping_method_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingMethodsApi->shippingMethodsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipping_method_id** | **string**| Shipping method identifier | |

### Return type

[**\kruegge82\jtlffn\Model\ShippingMethod**](../Model/ShippingMethod.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `shippingMethodsGetAll()`

```php
shippingMethodsGetAll($top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedShippingMethodResponse
```

Get All

Get all shipping methods you specified

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ShippingMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'shippingMethodId', 'name', 'carrierCode', 'carrierName', 'shippingType', 'fulfillerShippingMethodNumber'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->shippingMethodsGetAll($top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingMethodsApi->shippingMethodsGetAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;shippingMethodId&#39;, &#39;name&#39;, &#39;carrierCode&#39;, &#39;carrierName&#39;, &#39;shippingType&#39;, &#39;fulfillerShippingMethodNumber&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedShippingMethodResponse**](../Model/PagedShippingMethodResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `shippingMethodsGetUpdates()`

```php
shippingMethodsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentShippingMethodList
```

Get Updates

Query shipping methods for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ShippingMethodsApi(
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
    $result = $apiInstance->shippingMethodsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingMethodsApi->shippingMethodsGetUpdates: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentShippingMethodList**](../Model/RecentShippingMethodList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `shippingMethodsPost()`

```php
shippingMethodsPost($create_shipping_method_request): \kruegge82\jtlffn\Model\ShippingMethod
```

Post

Create a new shipping method

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ShippingMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$create_shipping_method_request = new \kruegge82\jtlffn\Model\CreateShippingMethodRequest(); // \kruegge82\jtlffn\Model\CreateShippingMethodRequest | Details af the shipping method that has to be created

try {
    $result = $apiInstance->shippingMethodsPost($create_shipping_method_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingMethodsApi->shippingMethodsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_shipping_method_request** | [**\kruegge82\jtlffn\Model\CreateShippingMethodRequest**](../Model/CreateShippingMethodRequest.md)| Details af the shipping method that has to be created | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\ShippingMethod**](../Model/ShippingMethod.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `shippingMethodsUpdate()`

```php
shippingMethodsUpdate($shipping_method_id, $update_shipping_method_request)
```

Update

Update a shipping method

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ShippingMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$shipping_method_id = 'shipping_method_id_example'; // string | 
$update_shipping_method_request = new \kruegge82\jtlffn\Model\UpdateShippingMethodRequest(); // \kruegge82\jtlffn\Model\UpdateShippingMethodRequest | Details af the shipping method that has to be created

try {
    $apiInstance->shippingMethodsUpdate($shipping_method_id, $update_shipping_method_request);
} catch (Exception $e) {
    echo 'Exception when calling ShippingMethodsApi->shippingMethodsUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipping_method_id** | **string**|  | |
| **update_shipping_method_request** | [**\kruegge82\jtlffn\Model\UpdateShippingMethodRequest**](../Model/UpdateShippingMethodRequest.md)| Details af the shipping method that has to be created | [optional] |

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
