# # Product

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**jfsku** | **string** | Product identifer |
**merchant_id** | **string** | Merchant identifier |
**name** | **string** | Name of the product |
**merchant_sku** | **string** | SKU (Stock Keeping Unit) of the merchant |
**pictures** | [**\kruegge82\jtlffn\Model\Picture[]**](Picture.md) | Pictures of the product |
**product_group** | **string** | Group of the product | [optional]
**origin_country** | **string** | Country of origin | [optional]
**manufacturer** | **string** | Name of manufacturer | [optional]
**weight** | **float** | Weight in kg | [optional]
**net_weight** | **float** | Weight of the raw product in kg (does not include the weight of the products packaging or container) | [optional]
**note** | **string** | Note | [optional]
**identifier** | [**\kruegge82\jtlffn\Model\Identifier**](Identifier.md) |  |
**specifications** | [**\kruegge82\jtlffn\Model\Specifications**](Specifications.md) |  | [optional]
**dimensions** | [**\kruegge82\jtlffn\Model\Dimensions**](Dimensions.md) |  | [optional]
**attributes** | [**\kruegge82\jtlffn\Model\Attribute[]**](Attribute.md) | A product can have multiple attributes which represent custom fields |
**net_retail_price** | [**\kruegge82\jtlffn\Model\Price**](Price.md) |  | [optional]
**bundles** | [**\kruegge82\jtlffn\Model\ProductBundle[]**](ProductBundle.md) | Packagings of a quantity products |
**related_products** | [**\kruegge82\jtlffn\Model\RelatedProduct[]**](RelatedProduct.md) | Packagings of a quantity products |
**condition** | [**\kruegge82\jtlffn\Model\ConditionType**](ConditionType.md) |  | [optional]
**modification_info** | [**\kruegge82\jtlffn\Model\ModificationInfo**](ModificationInfo.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
