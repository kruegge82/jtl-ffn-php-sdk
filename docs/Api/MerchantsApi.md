# kruegge82\jtlffn\MerchantsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**merchantsGet()**](MerchantsApi.md#merchantsGet) | **GET** /api/v1/fulfiller/merchants/{merchantId} | Get |
| [**merchantsGetAll()**](MerchantsApi.md#merchantsGetAll) | **GET** /api/v1/fulfiller/merchants | Get All |
| [**merchantsGetUpdates()**](MerchantsApi.md#merchantsGetUpdates) | **GET** /api/v1/fulfiller/merchants/updates | Get Updates |


## `merchantsGet()`

```php
merchantsGet($merchant_id): \kruegge82\jtlffn\Model\Merchant
```

Get

Get a specific authorized merchant

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\MerchantsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$merchant_id = 'merchant_id_example'; // string | Merchant identifier

try {
    $result = $apiInstance->merchantsGet($merchant_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantsApi->merchantsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **merchant_id** | **string**| Merchant identifier | |

### Return type

[**\kruegge82\jtlffn\Model\Merchant**](../Model/Merchant.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `merchantsGetAll()`

```php
merchantsGetAll($top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedMerchantResponse
```

Get All

Get all authorized merchants

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\MerchantsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'userId', 'address/lastname', 'address/company', 'address/city', 'address/email'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->merchantsGetAll($top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantsApi->merchantsGetAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;userId&#39;, &#39;address/lastname&#39;, &#39;address/company&#39;, &#39;address/city&#39;, &#39;address/email&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedMerchantResponse**](../Model/PagedMerchantResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `merchantsGetUpdates()`

```php
merchantsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentMerchantList
```

Get Updates

Query ffn server api fulfiller merchants models merchants for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\MerchantsApi(
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
    $result = $apiInstance->merchantsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MerchantsApi->merchantsGetUpdates: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentMerchantList**](../Model/RecentMerchantList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
