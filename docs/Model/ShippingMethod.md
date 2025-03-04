# # ShippingMethod

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipping_method_id** | **string** | Shipping methos identifier |
**name** | **string** | Name of the shipping method |
**shipping_type** | [**\kruegge82\jtlffn\Model\ShippingType**](ShippingType.md) |  |
**tracking_url_schema** | **string** | Tracking URL schema for dynamic tracking URL creation | [optional]
**carrier_code** | **string** | Carrier Code of the shipping method | [optional]
**carrier_name** | **string** | Carrier name of the shipping method | [optional]
**cutoff_time** | **string** | Cut off time of the shipping method. The cut off time is the lastest time an outbound can arrive at JTL-Fulfillment network so that the outbound will be shipped and handed over to the carrier | [optional]
**note** | **string** | Note of the shipping method | [optional]
**fulfiller_shipping_method_number** | **string** |  |
**modification_info** | [**\kruegge82\jtlffn\Model\ModificationInfo**](ModificationInfo.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
