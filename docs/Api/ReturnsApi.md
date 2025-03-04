# kruegge82\jtlffn\ReturnsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**returnsDelete()**](ReturnsApi.md#returnsDelete) | **DELETE** /api/v1/fulfiller/returns/{returnId} | Delete |
| [**returnsDeleteReturnItem()**](ReturnsApi.md#returnsDeleteReturnItem) | **DELETE** /api/v1/fulfiller/returns/{returnId}/items/{returnItemId} | Delete Return Item |
| [**returnsGet()**](ReturnsApi.md#returnsGet) | **GET** /api/v1/fulfiller/returns/{returnId} | Get |
| [**returnsGetAll()**](ReturnsApi.md#returnsGetAll) | **GET** /api/v1/fulfiller/returns | Get All |
| [**returnsGetChanges()**](ReturnsApi.md#returnsGetChanges) | **GET** /api/v1/fulfiller/returns/changes | Get Changes |
| [**returnsGetChangesFromReturn()**](ReturnsApi.md#returnsGetChangesFromReturn) | **GET** /api/v1/fulfiller/returns/{returnId}/changes | Get Changes for specific for specific Return |
| [**returnsGetReturnItem()**](ReturnsApi.md#returnsGetReturnItem) | **GET** /api/v1/fulfiller/returns/{returnId}/items/{returnItemId} | Get Return Item |
| [**returnsGetUpdates()**](ReturnsApi.md#returnsGetUpdates) | **GET** /api/v1/fulfiller/returns/updates | Get Updates |
| [**returnsLock()**](ReturnsApi.md#returnsLock) | **PUT** /api/v1/fulfiller/returns/{returnId}/lock | Lock |
| [**returnsPatch()**](ReturnsApi.md#returnsPatch) | **PATCH** /api/v1/fulfiller/returns/{returnId} | Patch |
| [**returnsPatchReturnItem()**](ReturnsApi.md#returnsPatchReturnItem) | **PATCH** /api/v1/fulfiller/returns/{returnId}/items/{returnItemId} | Patch Return Item |
| [**returnsPost()**](ReturnsApi.md#returnsPost) | **POST** /api/v1/fulfiller/returns | Post |
| [**returnsPostIncomingReturnItem()**](ReturnsApi.md#returnsPostIncomingReturnItem) | **POST** /api/v1/fulfiller/returns/{returnId}/items/{returnItemId}/incomming-goods | Post Incoming Return Item |
| [**returnsPostReturnItem()**](ReturnsApi.md#returnsPostReturnItem) | **POST** /api/v1/fulfiller/returns/{returnId}/items | Post Return Item |
| [**returnsSplitReturnItem()**](ReturnsApi.md#returnsSplitReturnItem) | **POST** /api/v1/fulfiller/returns/{returnId}/items/{returnItemId} | Split Return Item |
| [**returnsUnlock()**](ReturnsApi.md#returnsUnlock) | **PUT** /api/v1/fulfiller/returns/{returnId}/unlock | Unlock |


## `returnsDelete()`

```php
returnsDelete($return_id)
```

Delete

Delete a return

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer

try {
    $apiInstance->returnsDelete($return_id);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |

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

## `returnsDeleteReturnItem()`

```php
returnsDeleteReturnItem($return_id, $return_item_id)
```

Delete Return Item

Delete a return

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$return_item_id = 'return_item_id_example'; // string | 

try {
    $apiInstance->returnsDeleteReturnItem($return_id, $return_item_id);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsDeleteReturnItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **return_item_id** | **string**|  | |

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

## `returnsGet()`

```php
returnsGet($return_id): \kruegge82\jtlffn\Model\ModelReturn
```

Get

Get a specific return

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer

try {
    $result = $apiInstance->returnsGet($return_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |

### Return type

[**\kruegge82\jtlffn\Model\ModelReturn**](../Model/ModelReturn.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsGetAll()`

```php
returnsGetAll($top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedReturnResponse
```

Get All

Get all your returns

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'returnId', 'state', 'warehouseId', 'merchantId', 'merchantReturnNumber', 'fulfillerReturnNumber', 'customerAddress/lastname', 'customerAddress/company', 'customerAddress/city', 'customerAddress/email', 'items/returnItemId', 'items/jfsku', 'items/merchantSku', 'items/name', 'items/outboundId', 'items/condition'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->returnsGetAll($top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsGetAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;returnId&#39;, &#39;state&#39;, &#39;warehouseId&#39;, &#39;merchantId&#39;, &#39;merchantReturnNumber&#39;, &#39;fulfillerReturnNumber&#39;, &#39;customerAddress/lastname&#39;, &#39;customerAddress/company&#39;, &#39;customerAddress/city&#39;, &#39;customerAddress/email&#39;, &#39;items/returnItemId&#39;, &#39;items/jfsku&#39;, &#39;items/merchantSku&#39;, &#39;items/name&#39;, &#39;items/outboundId&#39;, &#39;items/condition&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedReturnResponse**](../Model/PagedReturnResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsGetChanges()`

```php
returnsGetChanges($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentReturnChangeList
```

Get Changes

Query returns for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
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
    $result = $apiInstance->returnsGetChanges($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsGetChanges: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentReturnChangeList**](../Model/RecentReturnChangeList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsGetChangesFromReturn()`

```php
returnsGetChangesFromReturn($return_id, $from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentReturnChangeList
```

Get Changes for specific for specific Return

Query changes for specific Return within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | 
$from_date = 'from_date_example'; // string | The start date of the timeframe.
$to_date = 'to_date_example'; // string | The end date of the timeframe.
$page = 1; // int | Page number.
$ignore_own_application_id = false; // bool | If true, modifications from your own application-id will not be returned
$ignore_own_user_id = false; // bool | If true, modifications from your own user-id will not be returned

try {
    $result = $apiInstance->returnsGetChangesFromReturn($return_id, $from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsGetChangesFromReturn: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**|  | |
| **from_date** | **string**| The start date of the timeframe. | [optional] |
| **to_date** | **string**| The end date of the timeframe. | [optional] |
| **page** | **int**| Page number. | [optional] [default to 1] |
| **ignore_own_application_id** | **bool**| If true, modifications from your own application-id will not be returned | [optional] [default to false] |
| **ignore_own_user_id** | **bool**| If true, modifications from your own user-id will not be returned | [optional] [default to false] |

### Return type

[**\kruegge82\jtlffn\Model\RecentReturnChangeList**](../Model/RecentReturnChangeList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsGetReturnItem()`

```php
returnsGetReturnItem($return_id, $return_item_id): \kruegge82\jtlffn\Model\ReturnItem
```

Get Return Item

Get a specific return

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$return_item_id = 'return_item_id_example'; // string | 

try {
    $result = $apiInstance->returnsGetReturnItem($return_id, $return_item_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsGetReturnItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **return_item_id** | **string**|  | |

### Return type

[**\kruegge82\jtlffn\Model\ReturnItem**](../Model/ReturnItem.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsGetUpdates()`

```php
returnsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentReturnList
```

Get Updates

Query returns for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
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
    $result = $apiInstance->returnsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsGetUpdates: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentReturnList**](../Model/RecentReturnList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsLock()`

```php
returnsLock($return_id, $object_version)
```

Lock

Update a return

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$object_version = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Last known modification date of this return.

try {
    $apiInstance->returnsLock($return_id, $object_version);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsLock: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **object_version** | **\DateTime**| Last known modification date of this return. | [optional] |

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

## `returnsPatch()`

```php
returnsPatch($return_id, $object_version, $update_return_request)
```

Patch

Update a return

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$object_version = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Last known modification date of this return.
$update_return_request = new \kruegge82\jtlffn\Model\UpdateReturnRequest(); // \kruegge82\jtlffn\Model\UpdateReturnRequest | Return details

try {
    $apiInstance->returnsPatch($return_id, $object_version, $update_return_request);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsPatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **object_version** | **\DateTime**| Last known modification date of this return. | [optional] |
| **update_return_request** | [**\kruegge82\jtlffn\Model\UpdateReturnRequest**](../Model/UpdateReturnRequest.md)| Return details | [optional] |

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

## `returnsPatchReturnItem()`

```php
returnsPatchReturnItem($return_id, $return_item_id, $object_version, $update_return_item_request)
```

Patch Return Item

Update a return item

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$return_item_id = 'return_item_id_example'; // string | Return item identifer
$object_version = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Last known modification date of this return.
$update_return_item_request = new \kruegge82\jtlffn\Model\UpdateReturnItemRequest(); // \kruegge82\jtlffn\Model\UpdateReturnItemRequest | 

try {
    $apiInstance->returnsPatchReturnItem($return_id, $return_item_id, $object_version, $update_return_item_request);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsPatchReturnItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **return_item_id** | **string**| Return item identifer | |
| **object_version** | **\DateTime**| Last known modification date of this return. | [optional] |
| **update_return_item_request** | [**\kruegge82\jtlffn\Model\UpdateReturnItemRequest**](../Model/UpdateReturnItemRequest.md)|  | [optional] |

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

## `returnsPost()`

```php
returnsPost($create_return_request): \kruegge82\jtlffn\Model\ModelReturn
```

Post

Create a new return

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$create_return_request = new \kruegge82\jtlffn\Model\CreateReturnRequest(); // \kruegge82\jtlffn\Model\CreateReturnRequest | Return details

try {
    $result = $apiInstance->returnsPost($create_return_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_return_request** | [**\kruegge82\jtlffn\Model\CreateReturnRequest**](../Model/CreateReturnRequest.md)| Return details | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\ModelReturn**](../Model/ModelReturn.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsPostIncomingReturnItem()`

```php
returnsPostIncomingReturnItem($return_id, $return_item_id, $object_version, $create_incoming_return_item_request): \kruegge82\jtlffn\Model\StockChange
```

Post Incoming Return Item

Declare an item as arrived at your warehouse. The stock of the product from this item will be adjusted automatically. The specified quantity or quantity blocked must correspond to the quantity from the return item. The state of the item must be 'arrived'

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$return_item_id = 'return_item_id_example'; // string | 
$object_version = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Last known modification date of this return.
$create_incoming_return_item_request = new \kruegge82\jtlffn\Model\CreateIncomingReturnItemRequest(); // \kruegge82\jtlffn\Model\CreateIncomingReturnItemRequest | 

try {
    $result = $apiInstance->returnsPostIncomingReturnItem($return_id, $return_item_id, $object_version, $create_incoming_return_item_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsPostIncomingReturnItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **return_item_id** | **string**|  | |
| **object_version** | **\DateTime**| Last known modification date of this return. | [optional] |
| **create_incoming_return_item_request** | [**\kruegge82\jtlffn\Model\CreateIncomingReturnItemRequest**](../Model/CreateIncomingReturnItemRequest.md)|  | [optional] |

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

## `returnsPostReturnItem()`

```php
returnsPostReturnItem($return_id, $object_version, $create_return_item_request): \kruegge82\jtlffn\Model\ReturnItem
```

Post Return Item

Create a new return item

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$object_version = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Last known modification date of this return.
$create_return_item_request = new \kruegge82\jtlffn\Model\CreateReturnItemRequest(); // \kruegge82\jtlffn\Model\CreateReturnItemRequest | 

try {
    $result = $apiInstance->returnsPostReturnItem($return_id, $object_version, $create_return_item_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsPostReturnItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **object_version** | **\DateTime**| Last known modification date of this return. | [optional] |
| **create_return_item_request** | [**\kruegge82\jtlffn\Model\CreateReturnItemRequest**](../Model/CreateReturnItemRequest.md)|  | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\ReturnItem**](../Model/ReturnItem.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsSplitReturnItem()`

```php
returnsSplitReturnItem($return_id, $return_item_id, $object_version, $create_return_item_split_request): \kruegge82\jtlffn\Model\ReturnItem
```

Split Return Item

Split the return item into two items.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$return_item_id = 'return_item_id_example'; // string | 
$object_version = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Last known modification date of this return.
$create_return_item_split_request = new \kruegge82\jtlffn\Model\CreateReturnItemSplitRequest(); // \kruegge82\jtlffn\Model\CreateReturnItemSplitRequest | 

try {
    $result = $apiInstance->returnsSplitReturnItem($return_id, $return_item_id, $object_version, $create_return_item_split_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsSplitReturnItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **return_item_id** | **string**|  | |
| **object_version** | **\DateTime**| Last known modification date of this return. | [optional] |
| **create_return_item_split_request** | [**\kruegge82\jtlffn\Model\CreateReturnItemSplitRequest**](../Model/CreateReturnItemSplitRequest.md)|  | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\ReturnItem**](../Model/ReturnItem.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `returnsUnlock()`

```php
returnsUnlock($return_id, $object_version)
```

Unlock

Update a return

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\ReturnsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$return_id = 'return_id_example'; // string | Return identifer
$object_version = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Last known modification date of this return.

try {
    $apiInstance->returnsUnlock($return_id, $object_version);
} catch (Exception $e) {
    echo 'Exception when calling ReturnsApi->returnsUnlock: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **return_id** | **string**| Return identifer | |
| **object_version** | **\DateTime**| Last known modification date of this return. | [optional] |

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
