# kruegge82\jtlffn\OutboundsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**outboundsChangeStatus()**](OutboundsApi.md#outboundsChangeStatus) | **PUT** /api/v1/fulfiller/outbounds/{outboundId}/status | Change Status |
| [**outboundsChangeStatusBulk()**](OutboundsApi.md#outboundsChangeStatusBulk) | **POST** /api/v1/fulfiller/outbounds/status | Change Status Bulk |
| [**outboundsChangeWarehouse()**](OutboundsApi.md#outboundsChangeWarehouse) | **PUT** /api/v1/fulfiller/outbounds/{outboundId}/warehouse | Change Warehouse |
| [**outboundsGet()**](OutboundsApi.md#outboundsGet) | **GET** /api/v1/fulfiller/outbounds/{outboundId} | Get |
| [**outboundsGetAll()**](OutboundsApi.md#outboundsGetAll) | **GET** /api/v1/fulfiller/outbounds | Get All |
| [**outboundsGetOutboundAttachment()**](OutboundsApi.md#outboundsGetOutboundAttachment) | **GET** /api/v1/fulfiller/outbounds/{outboundId}/attachments/{merchantDocumentId} | Get Outbound Attachment |
| [**outboundsGetShippingLabelForOutbound()**](OutboundsApi.md#outboundsGetShippingLabelForOutbound) | **GET** /api/v1/fulfiller/outbounds/{outboundId}/shipping-labels/{shippingLabelId} | Get Shipping Label For Outbound |
| [**outboundsGetShippingNotification()**](OutboundsApi.md#outboundsGetShippingNotification) | **GET** /api/v1/fulfiller/outbounds/{outboundId}/shipping-notifications/{shippingNotificationId} | Get Shipping Notification |
| [**outboundsGetShippingNotifications()**](OutboundsApi.md#outboundsGetShippingNotifications) | **GET** /api/v1/fulfiller/outbounds/{outboundId}/shipping-notifications | Get Shipping Notifications |
| [**outboundsGetUpdates()**](OutboundsApi.md#outboundsGetUpdates) | **GET** /api/v1/fulfiller/outbounds/updates | Get Updates |
| [**outboundsPostShippingLabelForOutbound()**](OutboundsApi.md#outboundsPostShippingLabelForOutbound) | **POST** /api/v1/fulfiller/outbounds/{outboundId}/shipping-labels | Post Shipping Label For Outbound |
| [**outboundsPostShippingNotification()**](OutboundsApi.md#outboundsPostShippingNotification) | **POST** /api/v1/fulfiller/outbounds/{outboundId}/shipping-notifications | Post Shipping Notification |


## `outboundsChangeStatus()`

```php
outboundsChangeStatus($outbound_id, $object_version, $change_status_request)
```

Change Status

Change the status of an outbound. For example if an outbound started to be picked

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | Outbound identifier
$object_version = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Last known modification date of this outbound.
$change_status_request = new \kruegge82\jtlffn\Model\ChangeStatusRequest(); // \kruegge82\jtlffn\Model\ChangeStatusRequest | The new status that has to be applied to the outbound

try {
    $apiInstance->outboundsChangeStatus($outbound_id, $object_version, $change_status_request);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsChangeStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**| Outbound identifier | |
| **object_version** | **\DateTime**| Last known modification date of this outbound. | [optional] |
| **change_status_request** | [**\kruegge82\jtlffn\Model\ChangeStatusRequest**](../Model/ChangeStatusRequest.md)| The new status that has to be applied to the outbound | [optional] |

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

## `outboundsChangeStatusBulk()`

```php
outboundsChangeStatusBulk($change_outbound_status_request): \kruegge82\jtlffn\Model\ChangedOutboundStatus[]
```

Change Status Bulk

Change the status of multiple outbounds. Returns the list of changed outbounds. If it is not possible to change the status of a single outbound, the corresponding errorcode will be filled, otherwise the errorcode is empty.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$change_outbound_status_request = new \kruegge82\jtlffn\Model\ChangeOutboundStatusRequest(); // \kruegge82\jtlffn\Model\ChangeOutboundStatusRequest | The new status that has to be applied to the outbound

try {
    $result = $apiInstance->outboundsChangeStatusBulk($change_outbound_status_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsChangeStatusBulk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **change_outbound_status_request** | [**\kruegge82\jtlffn\Model\ChangeOutboundStatusRequest**](../Model/ChangeOutboundStatusRequest.md)| The new status that has to be applied to the outbound | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\ChangedOutboundStatus[]**](../Model/ChangedOutboundStatus.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsChangeWarehouse()`

```php
outboundsChangeWarehouse($outbound_id, $oversale, $change_warehouse_request)
```

Change Warehouse

Change the warehouse of an outbound that will be used for fulfilling that outbound

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | Outbound identifier
$oversale = True; // bool | Allow outbound with insufficient stock
$change_warehouse_request = new \kruegge82\jtlffn\Model\ChangeWarehouseRequest(); // \kruegge82\jtlffn\Model\ChangeWarehouseRequest | The new warehouse that shall be used to fulfill the outbound

try {
    $apiInstance->outboundsChangeWarehouse($outbound_id, $oversale, $change_warehouse_request);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsChangeWarehouse: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**| Outbound identifier | |
| **oversale** | **bool**| Allow outbound with insufficient stock | [optional] |
| **change_warehouse_request** | [**\kruegge82\jtlffn\Model\ChangeWarehouseRequest**](../Model/ChangeWarehouseRequest.md)| The new warehouse that shall be used to fulfill the outbound | [optional] |

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

## `outboundsGet()`

```php
outboundsGet($outbound_id): \kruegge82\jtlffn\Model\Outbound
```

Get

Get a specific Outbound

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | Outbound identifier

try {
    $result = $apiInstance->outboundsGet($outbound_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**| Outbound identifier | |

### Return type

[**\kruegge82\jtlffn\Model\Outbound**](../Model/Outbound.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsGetAll()`

```php
outboundsGetAll($top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedOutboundResponse
```

Get All

Get all outbounds

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'outboundId', 'merchantId', 'merchantOutboundNumber', 'warehouseId', 'externalNumber', 'premiumType', 'status', 'shippingAddress/lastname', 'shippingAddress/company', 'shippingAddress/city', 'shippingAddress/email', 'items/jfsku', 'items/outboundItemId', 'items/name', 'items/merchantSku', 'items/quantity', 'senderAddress/lastname', 'senderAddress/company', 'senderAddress/city', 'senderAddress/email', 'attributes/key', 'attributes/value', 'statusTimestamp/pending', 'statusTimestamp/preparation', 'statusTimestamp/acknowledged', 'statusTimestamp/locked', 'statusTimestamp/pickprocess', 'statusTimestamp/shipped', 'statusTimestamp/partiallyShipped', 'statusTimestamp/canceled', 'statusTimestamp/partiallyCanceled'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->outboundsGetAll($top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsGetAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;outboundId&#39;, &#39;merchantId&#39;, &#39;merchantOutboundNumber&#39;, &#39;warehouseId&#39;, &#39;externalNumber&#39;, &#39;premiumType&#39;, &#39;status&#39;, &#39;shippingAddress/lastname&#39;, &#39;shippingAddress/company&#39;, &#39;shippingAddress/city&#39;, &#39;shippingAddress/email&#39;, &#39;items/jfsku&#39;, &#39;items/outboundItemId&#39;, &#39;items/name&#39;, &#39;items/merchantSku&#39;, &#39;items/quantity&#39;, &#39;senderAddress/lastname&#39;, &#39;senderAddress/company&#39;, &#39;senderAddress/city&#39;, &#39;senderAddress/email&#39;, &#39;attributes/key&#39;, &#39;attributes/value&#39;, &#39;statusTimestamp/pending&#39;, &#39;statusTimestamp/preparation&#39;, &#39;statusTimestamp/acknowledged&#39;, &#39;statusTimestamp/locked&#39;, &#39;statusTimestamp/pickprocess&#39;, &#39;statusTimestamp/shipped&#39;, &#39;statusTimestamp/partiallyShipped&#39;, &#39;statusTimestamp/canceled&#39;, &#39;statusTimestamp/partiallyCanceled&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedOutboundResponse**](../Model/PagedOutboundResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsGetOutboundAttachment()`

```php
outboundsGetOutboundAttachment($outbound_id, $merchant_document_id): \kruegge82\jtlffn\Model\OutboundAttachmentData
```

Get Outbound Attachment

Get a specific attachment from an outbound

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | Outbound identifier
$merchant_document_id = 'merchant_document_id_example'; // string | Merchant document identifier

try {
    $result = $apiInstance->outboundsGetOutboundAttachment($outbound_id, $merchant_document_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsGetOutboundAttachment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**| Outbound identifier | |
| **merchant_document_id** | **string**| Merchant document identifier | |

### Return type

[**\kruegge82\jtlffn\Model\OutboundAttachmentData**](../Model/OutboundAttachmentData.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsGetShippingLabelForOutbound()`

```php
outboundsGetShippingLabelForOutbound($outbound_id, $shipping_label_id): \kruegge82\jtlffn\Model\OutboundShippingLabel
```

Get Shipping Label For Outbound

Get a specific shipping label from an outbound

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | Outbound identifier
$shipping_label_id = 'shipping_label_id_example'; // string | 

try {
    $result = $apiInstance->outboundsGetShippingLabelForOutbound($outbound_id, $shipping_label_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsGetShippingLabelForOutbound: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**| Outbound identifier | |
| **shipping_label_id** | **string**|  | |

### Return type

[**\kruegge82\jtlffn\Model\OutboundShippingLabel**](../Model/OutboundShippingLabel.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsGetShippingNotification()`

```php
outboundsGetShippingNotification($outbound_id, $shipping_notification_id): \kruegge82\jtlffn\Model\OutboundShippingNotification
```

Get Shipping Notification

Get a specific outbound shipping notification

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | Outbound identifier
$shipping_notification_id = 'shipping_notification_id_example'; // string | Outbound shipping notification identifier or fulfiller shipping notification number

try {
    $result = $apiInstance->outboundsGetShippingNotification($outbound_id, $shipping_notification_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsGetShippingNotification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**| Outbound identifier | |
| **shipping_notification_id** | **string**| Outbound shipping notification identifier or fulfiller shipping notification number | |

### Return type

[**\kruegge82\jtlffn\Model\OutboundShippingNotification**](../Model/OutboundShippingNotification.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsGetShippingNotifications()`

```php
outboundsGetShippingNotifications($outbound_id): \kruegge82\jtlffn\Model\OutboundShippingNotification[]
```

Get Shipping Notifications

Get all outbound shipping notifications from an outbound

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | Outbound identifier

try {
    $result = $apiInstance->outboundsGetShippingNotifications($outbound_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsGetShippingNotifications: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**| Outbound identifier | |

### Return type

[**\kruegge82\jtlffn\Model\OutboundShippingNotification[]**](../Model/OutboundShippingNotification.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsGetUpdates()`

```php
outboundsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentOutboundList
```

Get Updates

Query outbounds for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
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
    $result = $apiInstance->outboundsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsGetUpdates: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentOutboundList**](../Model/RecentOutboundList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsPostShippingLabelForOutbound()`

```php
outboundsPostShippingLabelForOutbound($outbound_id, $create_shipping_label_data_request): \kruegge82\jtlffn\Model\OutboundShippingLabel
```

Post Shipping Label For Outbound

Request a new shipping label for an outbound

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | 
$create_shipping_label_data_request = new \kruegge82\jtlffn\Model\CreateShippingLabelDataRequest(); // \kruegge82\jtlffn\Model\CreateShippingLabelDataRequest | 

try {
    $result = $apiInstance->outboundsPostShippingLabelForOutbound($outbound_id, $create_shipping_label_data_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsPostShippingLabelForOutbound: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**|  | |
| **create_shipping_label_data_request** | [**\kruegge82\jtlffn\Model\CreateShippingLabelDataRequest**](../Model/CreateShippingLabelDataRequest.md)|  | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\OutboundShippingLabel**](../Model/OutboundShippingLabel.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `outboundsPostShippingNotification()`

```php
outboundsPostShippingNotification($outbound_id, $create_outbound_shipping_notification_request): \kruegge82\jtlffn\Model\OutboundShippingNotification
```

Post Shipping Notification

Declare an outbound as shipped. Stock changed will be applied automatically

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\OutboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outbound_id = 'outbound_id_example'; // string | Outbound identifier
$create_outbound_shipping_notification_request = new \kruegge82\jtlffn\Model\CreateOutboundShippingNotificationRequest(); // \kruegge82\jtlffn\Model\CreateOutboundShippingNotificationRequest | Define items and packages that have been shipped

try {
    $result = $apiInstance->outboundsPostShippingNotification($outbound_id, $create_outbound_shipping_notification_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutboundsApi->outboundsPostShippingNotification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **outbound_id** | **string**| Outbound identifier | |
| **create_outbound_shipping_notification_request** | [**\kruegge82\jtlffn\Model\CreateOutboundShippingNotificationRequest**](../Model/CreateOutboundShippingNotificationRequest.md)| Define items and packages that have been shipped | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\OutboundShippingNotification**](../Model/OutboundShippingNotification.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
