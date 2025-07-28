<?php
/**
 * Address
 *
 * PHP version 8.1
 *
 * @category Class
 * @package  kruegge82\jtlffn
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Fulfiller Api
 *
 * # Introduction    JTL-FFN is a standardized interface for fulfillment service providers and their customers. Fulfiller can offer their services to merchants and merchants can respectively choose from a wide range of service providers according to their needs.    ## The ecosystem    The FFN network consists of this REST API, an online portal and third party integrations (JTL-Wawi being one of them). The REST API orchestrates the interactions between the participants and the portal website provides services by JTL (such as managing and certifying warehouses of a fulfiller and merchants searching for their service providers).    ## About this API    The base url of this api is [https://ffn2.api.jtl-software.com/api](https://ffn2.api.jtl-software.com/api).     This API (and this documentation) consists of three parts:  * Fulfiller API     - operations used when acting as a fulfiller in the network. Only users with the role `Fulfiller` can access these endpoints.  * Merchant API      - operations used when acting as a merchant in the network. Only users with the role `Merchant` can access these endpoints.  * Shared API        - operations available to all users.    Please use the navigation menu at the top to switch between the documentation for the different APIs.      # OAuth    The FFN-API uses [OAuth2](https://tools.ietf.org/html/rfc6749) with the [Authorization Code Grant](https://tools.ietf.org/html/rfc6749#section-4.1) for its endpoints. Users must have an active [JTL customer center](https://kundencenter.jtl-software.de) account to authorize against the OAuth2 server. Applications and services using the API must acquire client credentials from JTL.    ## Application credentials    When making calls against the API, you need to do it in the context of an application. You will get the credentials for your application from JTL.    Application credentials consist of the following:  * `client_id`       - uniquely identifies your application  * `client_secret`   - secret used to authenticate your application  * `callback_uri`    - the uri the OAuth2 server redirect to on authorization requests    ## Requesting authorization    When you want to authorize a user you redirect him to  `https://oauth2.api.jtl-software.com/authorize`  with the following query string parameters:  * `response_type`   - Must be set to \"code\" for the [Authorization Code Grant](https://tools.ietf.org/html/rfc6749#section-4.1).  * `redirect_uri`    - After the user accepts your authorization request this is the url that will be redirected to. It must match the `callback_uri` in your client credentials.  * `client_id`       - Your applications identifier from your application credentials.  * `scope`           - The scopes you wish to authorize (space delimited).  * `state`           - An opaque value that will be included when redirecting back after the user accepts the authorisation. This is not required, but is important for [security considerations](http://www.thread-safe.com/2014/05/the-correct-use-of-state-parameter-in.html).    After successful authorization by the user, the OAuth2 server will redirect back to your applications callback with the following query string parameters:  * `code`    - The authorization code.  * `state`   - The state parameter that was sent in the request.    ## Verifying authorization    The authorization code you acquired in the last step will now be exchanged for an access token. In order to do this you need to POST a request to `https://oauth2.api.jtl-software.com/token`.    >POST <https://oauth2.api.jtl-software.com/token>  >  >Authorization: Basic `application_basic_auth`\\  >Content-Type: application/x-www-form-urlencoded  >  >grant_type=authorization_code&code=`code`&redirect_uri=`redirect_uri`    In the Authorization header [Basic HTTP authentication](https://tools.ietf.org/html/rfc7617) is used. Your application credentials `client_id` will be used as the username and your `client_secret` as the password. The header should have the value \"Basic\" plus the Base64 encoded string comprising of `client_id:client_secret`.    The body of the request consist of the form encoded parameters:  * `grant_type`   - Must be set to \"authorization_code\".  * `code`         - The authorization code received from the previous step.  * `redirect_uri` - Must match the `callback_uri` in your client credentials.    A successful verification request will return a JSON response with the properties:  * `token_type`      - is always \"Bearer\"  * `expires_in`      - the time in seconds until the access token will expire  * `access_token`    - the access token used for API requests  * `refresh_token`   - token used to get a new access_token without needing to ask the user again    Now the APIs endpoints that need authorization can be called by setting the header  >Authorization: Bearer `access_token`    ## Refreshing authorization    To get a new `access_token` (for example when the old one expired) one can POST a request to `https://oauth2.api.jtl-software.com/token`.    >POST <https://oauth2.api.jtl-software.com/token>  >  >Authorization: Basic `application_basic_auth`\\  >Content-Type: application/x-www-form-urlencoded  >  >grant_type=refresh_token&refresh_token=`refresh_token`    The Basic HTTP Authorization works exactly as in the verification step.    The body of the request consist of the form encoded parameters:  * `grant_type`      - Must be set to \"refresh_token\".  * `refresh_token`   - The `refresh_token` you acquired during verification.    The response will be the same as in the verification step.    ## Scopes    Scopes allow fine grained control over what actions are allowed for a given application. During login users must approve the requested scopes, so it is often feasible to limit asking for permissions your application really needs.    Global scopes for common permission scenarios are the following:  * `ffn.fulfiller.read`  - full read access for the fulfiller API  * `ffn.fulfiller.write` - full write access for the fulfiller API  * `ffn.merchant.read`   - full read access for the merchant API  * `ffn.merchant.write`  - full write access for the merchant API    More fine grained scopes can be acquired from each respective endpoints documentation.    ## Example        ### Prerequsites    * JTL Customer center account (https://kundencenter.jtl-software.de/)  * cUrl (https://curl.se/)  * FFN portal account (just login here: https://fulfillment.jtl-software.com)  * FFN portal sandbox account (if you want to test on sandbox: https://fulfillment-sandbox.jtl-software.com)  * Oauth Client for authorization and define scopes      Values in this example (access_token, refresh_token, code...) are expired and cannot be used verbatim.    ### Step 1 - Create an OAuth client    Navigate to https://kundencenter.jtl-software.de/oauth and create a new OAuth client.  (You can´t navigate to Oauth in customer account, you should use this link, or you can change logged in  index to oauth)      !Templates define what scopes are possible for this client.    scopes with access rights:    * ffn.merchant.read - full read access for the fulfiller API  * ffn.merchant.write - full write access for the fulfiller API  * ffn.fulfiller.read  - full read access for the merchant API  * ffn.fulfiller.write - full write access for the merchant API    More fine grained scopes can be acquired from each respective endpoints documentation.    ![Client Scopes](img/oauth//scopesClient1.png)    Overview: clients, scopes, client-secret and client-id    ![Oauth Clients](img/oauth//ClientSecretScopes1.png)    In our example:    * client_id: 97170e65-d390-4633-ba46-d6ghef8222de  * client_secret: f364ldUw3wGJFGn3JXE2NpGdCvUSMlmK72gsYg1z  * redirect_uri: http://localhost:53972/ffn/sso    The values for this client should not be used in production and are for testing only.    ### Step 2 - User login    In this step you will redirect the user to the JTL OAuth website using his default browser. Here the user will provide his username/password and accept the requested scopes. Finally the JTL Oauth website will redirect to the provided redirect_uri and provide the code.    Template: authorize specified scopes and get code answer to request the access token    ```  https://oauth2.api.jtl-software.com/authorize?response_type=code&redirect_uri=[redirect_uri]&client_id=[client_id]&scope=[scopes]  ```    Note: the scopes should be seperated by spaces or %20    Filled with our example values:    ```  https://oauth2.api.jtl-software.com/authorize?response_type=code&redirect_uri=http://localhost:53972/ffn/sso/oauth&client_id=97170e65-d390-4633-ba46-d6ghef8222de&scope=ffn.merchant.read%20ffn.merchant.write  ```        * enter password     ![Sandbox Login](img/oauth/SandboxLogin.png)      * authorize scopes     ![Authorize Scopes](img/oauth/authorizeScopes.png)    * code answer from server    ![Antwort mit Code](img/oauth/answer_with_code.png)    Example of the answer from the OAuth server to our redirect_uri:    ```  http://localhost:53972/ffn/sso?code=def50200f3ac7aabbb6e82a6b131874115b858549dab62e73c68ea21a03de59b5744dc0f0ee321d7607062cf9bfa57471cd0ee7572db1d7b0a15779b0dda7d0ed8f8bfdb0f69939a34678d67aee41e4849d355d8aa223733ab1f397280b205fa739c6252d77d9ff600136e1b744352115fd62ba1035d8da4cbc1b6791c61d0bb621952b0a14625dd75807113ea0746e35528c304a8ce3c06724c1e1d9e1cb3709e9f52778bc8ca5b2d8f7c055f14244b1f8fcb61554c5bf48e02b882b87b9a76a43579eecd578cec97c6f603907e282e45cfec43837c063dc36b556d4974776a942f47cee19023e130ae852bfca6d3ca9c7cb3283d2bc4971f80651b626f8e7ba0ec2d13dddc4c528e1f3e470de907af7eb304d781534dd9b071d9760c9890e5756893c7800589c407bd2da3a2ff56c3fb15a410e24aa2df7ac54e8d0f7445e38e390171b58a0b66b337057d59acd29ed5bbc4df6bee921b244f030c86f49bcae21c9ca77c05eea0094414803f30089c39d585bf83604a2d9bbcc6442fbfdcff6cca946eb84d1eac2e4f98dff31a93460c951c853f9ef7140f572be963e82a3baf72afba34572af63ee7da  ```    Extract the code and note it for next steps.    ### Step 3 - Get an access_token from the code    Template: get access token + refresh token    ```  curl --location --request POST \"https://oauth2.api.jtl-software.com/token\"      --header \"Content-Type: application/x-www-form-urlencoded\"       -u \"[client_id]:[client_secret]\"      --data-urlencode \"grant_type=authorization_code\"       --data-urlencode \"redirect_uri=[redirect_uri]\"      --data-urlencode \"code=[code]\"   ```    Filled with our example values:    ```  curl --location --request POST \"https://oauth2.api.jtl-software.com/token\"      --header \"Content-Type: application/x-www-form-urlencoded\"       -u \"97170e64-d390-4696-ba46-d6fcef8207de:f364ldUw3wIJFGn3JXE2NpGdAvUSMlmK72gsYg1z\"      --data-urlencode \"grant_type=authorization_code\"       --data-urlencode \"redirect_uri=http://localhost:49420/oauth\"      --data-urlencode \"code=def50200e6f3c65cfaba9419cbf6e48a7ed4324ef851b0ace493213884496b851fd825b90b4f994ee265a62f2358bbcbb0f990af5dbfd93dc63e51a7a6fa3bcfc7f722f56366b0a726fd1ed5df1cb926b16610fc7beb0f236e8858e86397422e3caa75d8094af8ba8ad6a93b938bd341bec1e4df671ad71ad1d5fa41166f5d4b2a3ac7d9172c35a8501f10ad722ec2aea88439c21b148ec2ba85e93c17acebe7d7f3d0118a50941cab145ed5ce92946426e5d388584556c0b010c567b433c577a1c4f7b1dfb2c99c25a0efadece4f64f19e54305bfc591e2b30b1a7ba1a33af3e039bcfa80b21ca365dc003f07989fca92472c2c8e2daab51151624a6a10bc511f2ed586f06544f7b98566df4667f5bbd6ba7c6707cb673c767c9eab5a74e63a8269688941c3158e8cc1cb5ebe9a8aa468faf415171a481ee1489b58bedb5fc329b23e0e34e76a4a500270fbebe4e1d20a0f17cebc96cd8ab3db383af746ca0699da34b4665afad30e9dde4f5f507a1dd14c73a692f06de8bafe3be81d7744dbcd8c5f7d3c767101ff5ce0556c244130c1c3fc3f53975a841c0cacebb70118f7552f50c2d2b1c421b8a21e\"   ```    The result will be a JSON answer with the users access_token and refresh_token as well as the expiry in seconds.    ```  {      \"token_type\":\"Bearer\",      \"expires_in\":1800,      \"access_token\":\"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.       eyJhdWQiOiI5NzE3MGU2NC1kMzkwLTQ2OTYtYmE0Ni1kNmZjZWY4MjA3ZGUiLCJqdGkiOiJlOWVhN2Q0MWI1NDIzNTcyYWU0MDEzYjEzMDZiMGRkNWM3YmQ2ZTNjMDNhYTZmNjQ2M2NlMjUzNTc0ZmUyMWE3NGQyNTIyMTJhODQwMmI1ZCIsImlhdCI6MTY2MTI1MzE0OCwibmJmIjoxNjYxMjUzMTQ4LCJleHAiOjE2NjEyNTQ5NDgsInN1YiI6IjQ2MjA5Iiwic2NvcGVzIjpbImZmbi5tZXJjaGFudC5yZWFkIiwiZmZuLm1lcmNoYW50LndyaXRlIl19.eEwY021wR3BWVp-wbAVQrjfqwFbYqLlOV_ca-cb7-O3Kdpi8mkFQBxfI8rzSiV_1WpAINf4ydV9FR9Ty992SMiAqGJ3T9zDHd68oUDePeq7Xfafp-87UboI2mCfGd7518CoKVLqg5ohb4YCqgC7Dz588FofggCQyDZQSM-8raOgcM-pJ1TT7oRuYuDHsOzCOTPcX2YiGYKCc3M6kxlBy_NjrJoLa4qysLRmPkznWwj0caC7a0VJO5KubvECcMb9D7Byr3UNjI7GiGMAufa770V5qCjrWs4gOsRV-Bn7oQydvsL21qqjBKHcssQrlLZWmrcfKqgBKwfRXIx3Mu5HBCmtHjHMnuvPVEZAj6fEfIwjYSeTAHTHApEwbE7J1MPd8MU0K6X2YEUF315fXN5F3rO3ZL5FdTwcM1E-1-PKubLuMAaE6Lw-QsDtBoI4ESylomCmCCfgLV4Vj-in_oCJUmKXAX0tDSa9y9vb6oAExung_BTJCBemffCtkJ55Px7bvi9JXmwvI0pIFo3QzTUtRbFDizCMrPZvsatFx64mXX3IDoVqXr3uzvdetBIJEj2ngVdGRrKGt4Yboae5oFV2d5jdSZBL28pwGjey__ZB4zLR1DodQ0sOqDWJ3WsEjMYXU8_-IGrS8Kkw8Q0R0UqqyVLfcLr-cfH5tYqf2QLqAScY\",\"refresh_token\":\"def50200e636703f8d6372401e7b5e1163e0f46e5d593f6f8a1e9b1b2777d64684b87b7c552db62f9670bc482a3958d8aafb78083c7166c13f2f233fe4623d22873c819a560dc3213a51448a1e0763c2a0f7fb7230ceeae22a7fa84717458886584ab5a0ed1a500be5f9d3ed36b1d063d39b56c8431f3fe623055626c1f99f8c5b684853965645fe5c5bee941857aef79ae4f9b994316bec9d365119fe0fe8d035218c44d00a47c0e92b4613c1f388b9c171f3d79e45a6d2a52dfbd8d25608d6b0350420155e48cc179764a2432220cc0d1e9bfa7798050d0b36fe658e967186ea75cc1d1277cad973d43a0839c50b6885a87b5b446452855a00ac75c5f6d7f62b914496e30ab89a16b335977e4363b94dda7364bb052832a5d122696b6476fb0e1631030ea3c42d9659ca839cc44919efc9532c84f7170e634d3e189eb181d0c114ed9d8150c619f7567587e0311d89d51d1325646d2c014757ba7f2d7b02f7b56a52e093ed2ea95a8abe4a0289b24a5636dce8ad01c20e8cce8c4c51263e7f1731bb6335b0e31342e2439c77ab7cce7a147e24c9be9d61d8eba216fbfd4d5be2fba3502e69000ad6e67b7230a7f924\"  }  ```    ### Step 4 - Test the access_token    Using your newly aquired access_token you can test if its working (reminder: the access_token has a limited lifetime and might be expired, in which case we would need to refresh it (see Step 5)).    Template: Test communication with access token on sandbox or production (our client is for both systems)    ```  curl --location --request GET \"https://ffn-sbx.api.jtl-software.com/api/v1/users/current\"  --header \"Authorization: Bearer [access_token]\"  ```    If you cannot retrieve the user data using this endpoint make sure you have logged into our respective portal website (sandbox, production) at least once as this triggers user creation in the system.    ### Step 5 - Refresh access_token when it expires    Template: Get a new access token + refresh token with the refresh token    ```  curl --location --request POST \"https://oauth2.api.jtl-software.com/token\"       --header \"Content-Type: application/x-www-form-urlencoded\"       -u \"[client_id]:[client_secret]\"      --data-urlencode \"grant_type=refresh_token\"       --data-urlencode \"refresh_token=[refresh_token]\"  ```    Filled with our example values:    ```  curl --location --request POST \"https://oauth2.api.jtl-software.com/token\"      --header \"Content-Type: application/x-www-form-urlencoded\"      -u \"97170e64-d390-4696-ba46-d6fcef8207de:f364ldUw3wIJFGn3JXE2NpGdAvUSMlmK72gsYg1z\"      --data-urlencode \"grant_type=refresh_token\"      --data-urlencode \"refresh_token=def50200a01c0caff50b7db271f8268e3806ab2cce8e28e25f41e5fe9167a6521b47f6ed0dd3dd2d7856e1983ae645b032cf9285e91c1ee535decb0e0ca3e52670773f2737114955267d83db0204f80233214a623fcc36de04127e1cdcda006eaf60cacfb30c80081a8c9314e20117f64639ab5e333301a10173385c1bfc660709fde0b1a3517f8030dfdba8187e53c23c9d5fe9f33c48e11a4aa41bfd9ea1291507ea1bc8c64df32bdc91c61af907c41cf0bb305cae76e68448a85ad65b0a03a23ec35a7e9cc42aadd0792b9d7d187ae028e2759a7f4a0164f94d9baca29779a702f023216631e1e777069cc2bc65fd404f4fcc5818219063beb1717afe159b8110394af9a0d245de960c227b1183d6a745819ac08d92238938da798f702f83a3faf648f07a8a6d1e694c008517fd8be2fa154aab88a3eaacb3cbb1830c4bdee018e06c7f81e68c5844213f1d02372b23a22d99ac06a860748a3db891fd71768d74470c9a5a8571058dd901c888d13cd4481d63a800322614e63d3d8e6fb109ee7e1b1e046cd086ecbc2d4d362ca662e3ac867f21168833abd7a8247b06602197b7da555361efbf07b0afed69f7a558\"  ```    The result will be the same format as in step 3. Refresh_tokens are only valid for a single refresh and you will get a new refresh_token every single time that you must persist.    ### My token is not working!    #### 404 NotFound    You need to log into the respective portal website (sandbox-https://fulfillment-sandbox.jtl-software.com, production-https://fulfillment.jtl-software.com) at least once to trigger user creation.    #### 403 Forbidden    You might be missing scopes in your token and don't have sufficient rights.    #### 401 Forbidden    Incorrect Oauth method. For example, we do not support the Oauth method authorisation \"client_credentials grant\".  The authorisation method \"code grant\" with user must be used.
 *
 * The version of the OpenAPI document: v1
 * Contact: info@jtl-software.de
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.14.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace kruegge82\jtlffn\Model;

use \ArrayAccess;
use \kruegge82\jtlffn\ObjectSerializer;

/**
 * Address Class Doc Comment
 *
 * @category Class
 * @description A postal address (One of company or lastname must be given)
 * @package  kruegge82\jtlffn
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Address implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Address';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'salutation' => 'string',
        'firstname' => 'string',
        'lastname' => 'string',
        'company' => 'string',
        'street' => 'string',
        'city' => 'string',
        'zip' => 'string',
        'country' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'extra_line' => 'string',
        'extra_address_line' => 'string',
        'state' => 'string',
        'mobile' => 'string',
        'fax' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'salutation' => null,
        'firstname' => null,
        'lastname' => null,
        'company' => null,
        'street' => null,
        'city' => null,
        'zip' => null,
        'country' => 'ISO 3166 alpha-2',
        'email' => null,
        'phone' => null,
        'extra_line' => null,
        'extra_address_line' => null,
        'state' => null,
        'mobile' => null,
        'fax' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'salutation' => true,
        'firstname' => true,
        'lastname' => true,
        'company' => true,
        'street' => false,
        'city' => false,
        'zip' => true,
        'country' => false,
        'email' => true,
        'phone' => true,
        'extra_line' => true,
        'extra_address_line' => true,
        'state' => true,
        'mobile' => true,
        'fax' => true
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'salutation' => 'salutation',
        'firstname' => 'firstname',
        'lastname' => 'lastname',
        'company' => 'company',
        'street' => 'street',
        'city' => 'city',
        'zip' => 'zip',
        'country' => 'country',
        'email' => 'email',
        'phone' => 'phone',
        'extra_line' => 'extraLine',
        'extra_address_line' => 'extraAddressLine',
        'state' => 'state',
        'mobile' => 'mobile',
        'fax' => 'fax'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'salutation' => 'setSalutation',
        'firstname' => 'setFirstname',
        'lastname' => 'setLastname',
        'company' => 'setCompany',
        'street' => 'setStreet',
        'city' => 'setCity',
        'zip' => 'setZip',
        'country' => 'setCountry',
        'email' => 'setEmail',
        'phone' => 'setPhone',
        'extra_line' => 'setExtraLine',
        'extra_address_line' => 'setExtraAddressLine',
        'state' => 'setState',
        'mobile' => 'setMobile',
        'fax' => 'setFax'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'salutation' => 'getSalutation',
        'firstname' => 'getFirstname',
        'lastname' => 'getLastname',
        'company' => 'getCompany',
        'street' => 'getStreet',
        'city' => 'getCity',
        'zip' => 'getZip',
        'country' => 'getCountry',
        'email' => 'getEmail',
        'phone' => 'getPhone',
        'extra_line' => 'getExtraLine',
        'extra_address_line' => 'getExtraAddressLine',
        'state' => 'getState',
        'mobile' => 'getMobile',
        'fax' => 'getFax'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('salutation', $data ?? [], null);
        $this->setIfExists('firstname', $data ?? [], null);
        $this->setIfExists('lastname', $data ?? [], null);
        $this->setIfExists('company', $data ?? [], null);
        $this->setIfExists('street', $data ?? [], null);
        $this->setIfExists('city', $data ?? [], null);
        $this->setIfExists('zip', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('phone', $data ?? [], null);
        $this->setIfExists('extra_line', $data ?? [], null);
        $this->setIfExists('extra_address_line', $data ?? [], null);
        $this->setIfExists('state', $data ?? [], null);
        $this->setIfExists('mobile', $data ?? [], null);
        $this->setIfExists('fax', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['salutation']) && (mb_strlen($this->container['salutation']) > 255)) {
            $invalidProperties[] = "invalid value for 'salutation', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['salutation']) && (mb_strlen($this->container['salutation']) < 0)) {
            $invalidProperties[] = "invalid value for 'salutation', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['firstname']) && (mb_strlen($this->container['firstname']) > 255)) {
            $invalidProperties[] = "invalid value for 'firstname', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['firstname']) && (mb_strlen($this->container['firstname']) < 0)) {
            $invalidProperties[] = "invalid value for 'firstname', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['lastname']) && (mb_strlen($this->container['lastname']) > 255)) {
            $invalidProperties[] = "invalid value for 'lastname', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['lastname']) && (mb_strlen($this->container['lastname']) < 0)) {
            $invalidProperties[] = "invalid value for 'lastname', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['company']) && (mb_strlen($this->container['company']) > 255)) {
            $invalidProperties[] = "invalid value for 'company', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['company']) && (mb_strlen($this->container['company']) < 0)) {
            $invalidProperties[] = "invalid value for 'company', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['street'] === null) {
            $invalidProperties[] = "'street' can't be null";
        }
        if ((mb_strlen($this->container['street']) > 255)) {
            $invalidProperties[] = "invalid value for 'street', the character length must be smaller than or equal to 255.";
        }

        if ((mb_strlen($this->container['street']) < 0)) {
            $invalidProperties[] = "invalid value for 'street', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['city'] === null) {
            $invalidProperties[] = "'city' can't be null";
        }
        if ((mb_strlen($this->container['city']) > 255)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be smaller than or equal to 255.";
        }

        if ((mb_strlen($this->container['city']) < 0)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['zip']) && (mb_strlen($this->container['zip']) > 255)) {
            $invalidProperties[] = "invalid value for 'zip', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['zip']) && (mb_strlen($this->container['zip']) < 1)) {
            $invalidProperties[] = "invalid value for 'zip', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        if ((mb_strlen($this->container['country']) > 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be smaller than or equal to 2.";
        }

        if ((mb_strlen($this->container['country']) < 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) > 255)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) < 0)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) > 255)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) < 0)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['extra_line']) && (mb_strlen($this->container['extra_line']) > 255)) {
            $invalidProperties[] = "invalid value for 'extra_line', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['extra_line']) && (mb_strlen($this->container['extra_line']) < 0)) {
            $invalidProperties[] = "invalid value for 'extra_line', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['extra_address_line']) && (mb_strlen($this->container['extra_address_line']) > 255)) {
            $invalidProperties[] = "invalid value for 'extra_address_line', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['extra_address_line']) && (mb_strlen($this->container['extra_address_line']) < 0)) {
            $invalidProperties[] = "invalid value for 'extra_address_line', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['state']) && (mb_strlen($this->container['state']) > 255)) {
            $invalidProperties[] = "invalid value for 'state', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['state']) && (mb_strlen($this->container['state']) < 0)) {
            $invalidProperties[] = "invalid value for 'state', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['mobile']) && (mb_strlen($this->container['mobile']) > 255)) {
            $invalidProperties[] = "invalid value for 'mobile', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['mobile']) && (mb_strlen($this->container['mobile']) < 0)) {
            $invalidProperties[] = "invalid value for 'mobile', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['fax']) && (mb_strlen($this->container['fax']) > 255)) {
            $invalidProperties[] = "invalid value for 'fax', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['fax']) && (mb_strlen($this->container['fax']) < 0)) {
            $invalidProperties[] = "invalid value for 'fax', the character length must be bigger than or equal to 0.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets salutation
     *
     * @return string|null
     */
    public function getSalutation()
    {
        return $this->container['salutation'];
    }

    /**
     * Sets salutation
     *
     * @param string|null $salutation Salutation
     *
     * @return self
     */
    public function setSalutation($salutation)
    {
        if (is_null($salutation)) {
            array_push($this->openAPINullablesSetToNull, 'salutation');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('salutation', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($salutation) && (mb_strlen($salutation) > 255)) {
            throw new \InvalidArgumentException('invalid length for $salutation when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($salutation) && (mb_strlen($salutation) < 0)) {
            throw new \InvalidArgumentException('invalid length for $salutation when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['salutation'] = $salutation;

        return $this;
    }

    /**
     * Gets firstname
     *
     * @return string|null
     */
    public function getFirstname()
    {
        return $this->container['firstname'];
    }

    /**
     * Sets firstname
     *
     * @param string|null $firstname Firstname
     *
     * @return self
     */
    public function setFirstname($firstname)
    {
        if (is_null($firstname)) {
            array_push($this->openAPINullablesSetToNull, 'firstname');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('firstname', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($firstname) && (mb_strlen($firstname) > 255)) {
            throw new \InvalidArgumentException('invalid length for $firstname when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($firstname) && (mb_strlen($firstname) < 0)) {
            throw new \InvalidArgumentException('invalid length for $firstname when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['firstname'] = $firstname;

        return $this;
    }

    /**
     * Gets lastname
     *
     * @return string|null
     */
    public function getLastname()
    {
        return $this->container['lastname'];
    }

    /**
     * Sets lastname
     *
     * @param string|null $lastname Lastname
     *
     * @return self
     */
    public function setLastname($lastname)
    {
        if (is_null($lastname)) {
            array_push($this->openAPINullablesSetToNull, 'lastname');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('lastname', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($lastname) && (mb_strlen($lastname) > 255)) {
            throw new \InvalidArgumentException('invalid length for $lastname when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($lastname) && (mb_strlen($lastname) < 0)) {
            throw new \InvalidArgumentException('invalid length for $lastname when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['lastname'] = $lastname;

        return $this;
    }

    /**
     * Gets company
     *
     * @return string|null
     */
    public function getCompany()
    {
        return $this->container['company'];
    }

    /**
     * Sets company
     *
     * @param string|null $company Company
     *
     * @return self
     */
    public function setCompany($company)
    {
        if (is_null($company)) {
            array_push($this->openAPINullablesSetToNull, 'company');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('company', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($company) && (mb_strlen($company) > 255)) {
            throw new \InvalidArgumentException('invalid length for $company when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($company) && (mb_strlen($company) < 0)) {
            throw new \InvalidArgumentException('invalid length for $company when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['company'] = $company;

        return $this;
    }

    /**
     * Gets street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->container['street'];
    }

    /**
     * Sets street
     *
     * @param string $street Street
     *
     * @return self
     */
    public function setStreet($street)
    {
        if (is_null($street)) {
            throw new \InvalidArgumentException('non-nullable street cannot be null');
        }
        if ((mb_strlen($street) > 255)) {
            throw new \InvalidArgumentException('invalid length for $street when calling Address., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($street) < 0)) {
            throw new \InvalidArgumentException('invalid length for $street when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['street'] = $street;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city City
     *
     * @return self
     */
    public function setCity($city)
    {
        if (is_null($city)) {
            throw new \InvalidArgumentException('non-nullable city cannot be null');
        }
        if ((mb_strlen($city) > 255)) {
            throw new \InvalidArgumentException('invalid length for $city when calling Address., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($city) < 0)) {
            throw new \InvalidArgumentException('invalid length for $city when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets zip
     *
     * @return string|null
     */
    public function getZip()
    {
        return $this->container['zip'];
    }

    /**
     * Sets zip
     *
     * @param string|null $zip Zip Code
     *
     * @return self
     */
    public function setZip($zip)
    {
        if (is_null($zip)) {
            array_push($this->openAPINullablesSetToNull, 'zip');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('zip', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($zip) && (mb_strlen($zip) > 255)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($zip) && (mb_strlen($zip) < 1)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling Address., must be bigger than or equal to 1.');
        }

        $this->container['zip'] = $zip;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country Country
     *
     * @return self
     */
    public function setCountry($country)
    {
        if (is_null($country)) {
            throw new \InvalidArgumentException('non-nullable country cannot be null');
        }
        if ((mb_strlen($country) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling Address., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling Address., must be bigger than or equal to 2.');
        }

        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email Email address
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            array_push($this->openAPINullablesSetToNull, 'email');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('email', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($email) && (mb_strlen($email) > 255)) {
            throw new \InvalidArgumentException('invalid length for $email when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($email) && (mb_strlen($email) < 0)) {
            throw new \InvalidArgumentException('invalid length for $email when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string|null $phone Phone number
     *
     * @return self
     */
    public function setPhone($phone)
    {
        if (is_null($phone)) {
            array_push($this->openAPINullablesSetToNull, 'phone');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('phone', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($phone) && (mb_strlen($phone) > 255)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($phone) && (mb_strlen($phone) < 0)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets extra_line
     *
     * @return string|null
     */
    public function getExtraLine()
    {
        return $this->container['extra_line'];
    }

    /**
     * Sets extra_line
     *
     * @param string|null $extra_line Second additional address line
     *
     * @return self
     */
    public function setExtraLine($extra_line)
    {
        if (is_null($extra_line)) {
            array_push($this->openAPINullablesSetToNull, 'extra_line');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('extra_line', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($extra_line) && (mb_strlen($extra_line) > 255)) {
            throw new \InvalidArgumentException('invalid length for $extra_line when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($extra_line) && (mb_strlen($extra_line) < 0)) {
            throw new \InvalidArgumentException('invalid length for $extra_line when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['extra_line'] = $extra_line;

        return $this;
    }

    /**
     * Gets extra_address_line
     *
     * @return string|null
     */
    public function getExtraAddressLine()
    {
        return $this->container['extra_address_line'];
    }

    /**
     * Sets extra_address_line
     *
     * @param string|null $extra_address_line First additional address line
     *
     * @return self
     */
    public function setExtraAddressLine($extra_address_line)
    {
        if (is_null($extra_address_line)) {
            array_push($this->openAPINullablesSetToNull, 'extra_address_line');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('extra_address_line', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($extra_address_line) && (mb_strlen($extra_address_line) > 255)) {
            throw new \InvalidArgumentException('invalid length for $extra_address_line when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($extra_address_line) && (mb_strlen($extra_address_line) < 0)) {
            throw new \InvalidArgumentException('invalid length for $extra_address_line when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['extra_address_line'] = $extra_address_line;

        return $this;
    }

    /**
     * Gets state
     *
     * @return string|null
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string|null $state State
     *
     * @return self
     */
    public function setState($state)
    {
        if (is_null($state)) {
            array_push($this->openAPINullablesSetToNull, 'state');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('state', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($state) && (mb_strlen($state) > 255)) {
            throw new \InvalidArgumentException('invalid length for $state when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($state) && (mb_strlen($state) < 0)) {
            throw new \InvalidArgumentException('invalid length for $state when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets mobile
     *
     * @return string|null
     */
    public function getMobile()
    {
        return $this->container['mobile'];
    }

    /**
     * Sets mobile
     *
     * @param string|null $mobile Mobile phone number
     *
     * @return self
     */
    public function setMobile($mobile)
    {
        if (is_null($mobile)) {
            array_push($this->openAPINullablesSetToNull, 'mobile');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('mobile', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($mobile) && (mb_strlen($mobile) > 255)) {
            throw new \InvalidArgumentException('invalid length for $mobile when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($mobile) && (mb_strlen($mobile) < 0)) {
            throw new \InvalidArgumentException('invalid length for $mobile when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['mobile'] = $mobile;

        return $this;
    }

    /**
     * Gets fax
     *
     * @return string|null
     */
    public function getFax()
    {
        return $this->container['fax'];
    }

    /**
     * Sets fax
     *
     * @param string|null $fax Fax number
     *
     * @return self
     */
    public function setFax($fax)
    {
        if (is_null($fax)) {
            array_push($this->openAPINullablesSetToNull, 'fax');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('fax', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($fax) && (mb_strlen($fax) > 255)) {
            throw new \InvalidArgumentException('invalid length for $fax when calling Address., must be smaller than or equal to 255.');
        }
        if (!is_null($fax) && (mb_strlen($fax) < 0)) {
            throw new \InvalidArgumentException('invalid length for $fax when calling Address., must be bigger than or equal to 0.');
        }

        $this->container['fax'] = $fax;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


