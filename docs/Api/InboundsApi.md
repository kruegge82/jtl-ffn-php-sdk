# kruegge82\jtlffn\InboundsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**inboundsClose()**](InboundsApi.md#inboundsClose) | **PUT** /api/v1/fulfiller/inbounds/{inboundId}/close | Close |
| [**inboundsGet()**](InboundsApi.md#inboundsGet) | **GET** /api/v1/fulfiller/inbounds/{inboundId} | Get |
| [**inboundsGetAll()**](InboundsApi.md#inboundsGetAll) | **GET** /api/v1/fulfiller/inbounds | Get All |
| [**inboundsGetInboundShippingNotificationUpdates()**](InboundsApi.md#inboundsGetInboundShippingNotificationUpdates) | **GET** /api/v1/fulfiller/inbounds/shipping-notifications/updates | Get Inbound Shipping Notification Updates |
| [**inboundsGetShippingNotification()**](InboundsApi.md#inboundsGetShippingNotification) | **GET** /api/v1/fulfiller/inbounds/{inboundId}/shipping-notifications/{shippingNotificationId} | Get Shipping Notification |
| [**inboundsGetShippingNotifications()**](InboundsApi.md#inboundsGetShippingNotifications) | **GET** /api/v1/fulfiller/inbounds/{inboundId}/shipping-notifications | Get Shipping Notifications |
| [**inboundsGetUpdates()**](InboundsApi.md#inboundsGetUpdates) | **GET** /api/v1/fulfiller/inbounds/updates | Get Updates |
| [**inboundsPostIncomingGoods()**](InboundsApi.md#inboundsPostIncomingGoods) | **POST** /api/v1/fulfiller/inbounds/{inboundId}/incoming-goods | Post Incoming Goods |
| [**inboundsPostIncomingGoodsBulk()**](InboundsApi.md#inboundsPostIncomingGoodsBulk) | **POST** /api/v1/fulfiller/inbounds/{inboundId}/incoming-goods/bulk | Post Incoming Goods Bulk |


## `inboundsClose()`

```php
inboundsClose($inbound_id)
```

Close

Close an inbound if you do not expect any further items for it. Closing an inbound reduces the announced quantities of products in that inbound

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inbound_id = 'inbound_id_example'; // string | Inbound identifier

try {
    $apiInstance->inboundsClose($inbound_id);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsClose: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inbound_id** | **string**| Inbound identifier | |

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

## `inboundsGet()`

```php
inboundsGet($inbound_id): \kruegge82\jtlffn\Model\Inbound
```

Get

Get a specific inbound by inboundId

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inbound_id = 'inbound_id_example'; // string | Inbound identifier

try {
    $result = $apiInstance->inboundsGet($inbound_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inbound_id** | **string**| Inbound identifier | |

### Return type

[**\kruegge82\jtlffn\Model\Inbound**](../Model/Inbound.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inboundsGetAll()`

```php
inboundsGetAll($top, $skip, $filter, $select, $order_by): \kruegge82\jtlffn\Model\PagedInboundResponse
```

Get All

Get inbounds of all your merchants

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$top = 50; // int | number of elements returned by the request
$skip = 56; // int | offset
$filter = 'filter_example'; // string | <h5>allowed fields</h5>                               'inboundId', 'merchantId', 'status', 'merchantInboundNumber', 'warehouseId', 'purchaseOrderNumber', 'externalInboundNumber', 'attributes/key', 'attributes/value', 'items/inboundItemId', 'items/jfsku', 'items/quantity', 'items/supplierSku'</br>
$select = 'select_example'; // string | select fields
$order_by = 'order_by_example'; // string | order result by field

try {
    $result = $apiInstance->inboundsGetAll($top, $skip, $filter, $select, $order_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsGetAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **top** | **int**| number of elements returned by the request | [optional] [default to 50] |
| **skip** | **int**| offset | [optional] |
| **filter** | **string**| &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;inboundId&#39;, &#39;merchantId&#39;, &#39;status&#39;, &#39;merchantInboundNumber&#39;, &#39;warehouseId&#39;, &#39;purchaseOrderNumber&#39;, &#39;externalInboundNumber&#39;, &#39;attributes/key&#39;, &#39;attributes/value&#39;, &#39;items/inboundItemId&#39;, &#39;items/jfsku&#39;, &#39;items/quantity&#39;, &#39;items/supplierSku&#39;&lt;/br&gt; | [optional] |
| **select** | **string**| select fields | [optional] |
| **order_by** | **string**| order result by field | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\PagedInboundResponse**](../Model/PagedInboundResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inboundsGetInboundShippingNotificationUpdates()`

```php
inboundsGetInboundShippingNotificationUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentInboundShippingNotificationList
```

Get Inbound Shipping Notification Updates

Query inbound shipping notifications for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
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
    $result = $apiInstance->inboundsGetInboundShippingNotificationUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsGetInboundShippingNotificationUpdates: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentInboundShippingNotificationList**](../Model/RecentInboundShippingNotificationList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inboundsGetShippingNotification()`

```php
inboundsGetShippingNotification($inbound_id, $shipping_notification_id): \kruegge82\jtlffn\Model\InboundShippingNotification
```

Get Shipping Notification

Get a specific inbound shipping notification

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inbound_id = 'inbound_id_example'; // string | Your unique merchant inbound number
$shipping_notification_id = 'shipping_notification_id_example'; // string | Inbound shipping notification identifier or merchant shipping notification number

try {
    $result = $apiInstance->inboundsGetShippingNotification($inbound_id, $shipping_notification_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsGetShippingNotification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inbound_id** | **string**| Your unique merchant inbound number | |
| **shipping_notification_id** | **string**| Inbound shipping notification identifier or merchant shipping notification number | |

### Return type

[**\kruegge82\jtlffn\Model\InboundShippingNotification**](../Model/InboundShippingNotification.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inboundsGetShippingNotifications()`

```php
inboundsGetShippingNotifications($inbound_id): \kruegge82\jtlffn\Model\InboundShippingNotification[]
```

Get Shipping Notifications

Get information regarding the shipment of an inbound

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inbound_id = 'inbound_id_example'; // string | Inbound identifier

try {
    $result = $apiInstance->inboundsGetShippingNotifications($inbound_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsGetShippingNotifications: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inbound_id** | **string**| Inbound identifier | |

### Return type

[**\kruegge82\jtlffn\Model\InboundShippingNotification[]**](../Model/InboundShippingNotification.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inboundsGetUpdates()`

```php
inboundsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id): \kruegge82\jtlffn\Model\RecentInboundList
```

Get Updates

Query inbounds for changes within a given timeframe.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
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
    $result = $apiInstance->inboundsGetUpdates($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsGetUpdates: ', $e->getMessage(), PHP_EOL;
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

[**\kruegge82\jtlffn\Model\RecentInboundList**](../Model/RecentInboundList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inboundsPostIncomingGoods()`

```php
inboundsPostIncomingGoods($inbound_id, $create_incoming_goods_item_request): \kruegge82\jtlffn\Model\Inbound
```

Post Incoming Goods

Declare an item as arrived at your warehouse. The stock of the specified product will be adjusted automatically.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inbound_id = 'inbound_id_example'; // string | Inbound identifier
$create_incoming_goods_item_request = new \kruegge82\jtlffn\Model\CreateIncomingGoodsItemRequest(); // \kruegge82\jtlffn\Model\CreateIncomingGoodsItemRequest | Specify the item that has arrived at your warehouse

try {
    $result = $apiInstance->inboundsPostIncomingGoods($inbound_id, $create_incoming_goods_item_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsPostIncomingGoods: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inbound_id** | **string**| Inbound identifier | |
| **create_incoming_goods_item_request** | [**\kruegge82\jtlffn\Model\CreateIncomingGoodsItemRequest**](../Model/CreateIncomingGoodsItemRequest.md)| Specify the item that has arrived at your warehouse | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\Inbound**](../Model/Inbound.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inboundsPostIncomingGoodsBulk()`

```php
inboundsPostIncomingGoodsBulk($inbound_id, $create_incoming_goods_bulk_request): \kruegge82\jtlffn\Model\Inbound
```

Post Incoming Goods Bulk

Declare multiple items as arrived at your warehouse.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new kruegge82\jtlffn\Api\InboundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inbound_id = 'inbound_id_example'; // string | Inbound identifier
$create_incoming_goods_bulk_request = new \kruegge82\jtlffn\Model\CreateIncomingGoodsBulkRequest(); // \kruegge82\jtlffn\Model\CreateIncomingGoodsBulkRequest | Collection of incoming goods items

try {
    $result = $apiInstance->inboundsPostIncomingGoodsBulk($inbound_id, $create_incoming_goods_bulk_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InboundsApi->inboundsPostIncomingGoodsBulk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inbound_id** | **string**| Inbound identifier | |
| **create_incoming_goods_bulk_request** | [**\kruegge82\jtlffn\Model\CreateIncomingGoodsBulkRequest**](../Model/CreateIncomingGoodsBulkRequest.md)| Collection of incoming goods items | [optional] |

### Return type

[**\kruegge82\jtlffn\Model\Inbound**](../Model/Inbound.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
