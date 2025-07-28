<?php
/**
 * ReturnsApi
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

namespace kruegge82\jtlffn\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use kruegge82\jtlffn\ApiException;
use kruegge82\jtlffn\Configuration;
use kruegge82\jtlffn\FormDataProcessor;
use kruegge82\jtlffn\HeaderSelector;
use kruegge82\jtlffn\ObjectSerializer;

/**
 * ReturnsApi Class Doc Comment
 *
 * @category Class
 * @package  kruegge82\jtlffn
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ReturnsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'returnsDelete' => [
            'application/json',
        ],
        'returnsDeleteReturnItem' => [
            'application/json',
        ],
        'returnsGet' => [
            'application/json',
        ],
        'returnsGetAll' => [
            'application/json',
        ],
        'returnsGetChanges' => [
            'application/json',
        ],
        'returnsGetChangesFromReturn' => [
            'application/json',
        ],
        'returnsGetReturnItem' => [
            'application/json',
        ],
        'returnsGetUpdates' => [
            'application/json',
        ],
        'returnsLock' => [
            'application/json',
        ],
        'returnsPatch' => [
            'application/json',
        ],
        'returnsPatchReturnItem' => [
            'application/json',
        ],
        'returnsPost' => [
            'application/json',
        ],
        'returnsPostIncomingReturnItem' => [
            'application/json',
        ],
        'returnsPostReturnItem' => [
            'application/json',
        ],
        'returnsSplitReturnItem' => [
            'application/json',
        ],
        'returnsUnlock' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ?ClientInterface $client = null,
        ?Configuration $config = null,
        ?HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation returnsDelete
     *
     * Delete
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDelete'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function returnsDelete($return_id, string $contentType = self::contentTypes['returnsDelete'][0])
    {
        $this->returnsDeleteWithHttpInfo($return_id, $contentType);
    }

    /**
     * Operation returnsDeleteWithHttpInfo
     *
     * Delete
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDelete'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsDeleteWithHttpInfo($return_id, string $contentType = self::contentTypes['returnsDelete'][0])
    {
        $request = $this->returnsDeleteRequest($return_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsDeleteAsync
     *
     * Delete
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsDeleteAsync($return_id, string $contentType = self::contentTypes['returnsDelete'][0])
    {
        return $this->returnsDeleteAsyncWithHttpInfo($return_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsDeleteAsyncWithHttpInfo
     *
     * Delete
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsDeleteAsyncWithHttpInfo($return_id, string $contentType = self::contentTypes['returnsDelete'][0])
    {
        $returnType = '';
        $request = $this->returnsDeleteRequest($return_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsDelete'
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsDeleteRequest($return_id, string $contentType = self::contentTypes['returnsDelete'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsDelete'
            );
        }


        $resourcePath = '/api/v1/fulfiller/returns/{returnId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsDeleteReturnItem
     *
     * Delete Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDeleteReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function returnsDeleteReturnItem($return_id, $return_item_id, string $contentType = self::contentTypes['returnsDeleteReturnItem'][0])
    {
        $this->returnsDeleteReturnItemWithHttpInfo($return_id, $return_item_id, $contentType);
    }

    /**
     * Operation returnsDeleteReturnItemWithHttpInfo
     *
     * Delete Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDeleteReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsDeleteReturnItemWithHttpInfo($return_id, $return_item_id, string $contentType = self::contentTypes['returnsDeleteReturnItem'][0])
    {
        $request = $this->returnsDeleteReturnItemRequest($return_id, $return_item_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsDeleteReturnItemAsync
     *
     * Delete Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDeleteReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsDeleteReturnItemAsync($return_id, $return_item_id, string $contentType = self::contentTypes['returnsDeleteReturnItem'][0])
    {
        return $this->returnsDeleteReturnItemAsyncWithHttpInfo($return_id, $return_item_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsDeleteReturnItemAsyncWithHttpInfo
     *
     * Delete Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDeleteReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsDeleteReturnItemAsyncWithHttpInfo($return_id, $return_item_id, string $contentType = self::contentTypes['returnsDeleteReturnItem'][0])
    {
        $returnType = '';
        $request = $this->returnsDeleteReturnItemRequest($return_id, $return_item_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsDeleteReturnItem'
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsDeleteReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsDeleteReturnItemRequest($return_id, $return_item_id, string $contentType = self::contentTypes['returnsDeleteReturnItem'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsDeleteReturnItem'
            );
        }

        // verify the required parameter 'return_item_id' is set
        if ($return_item_id === null || (is_array($return_item_id) && count($return_item_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_item_id when calling returnsDeleteReturnItem'
            );
        }


        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/items/{returnItemId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }
        // path params
        if ($return_item_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnItemId' . '}',
                ObjectSerializer::toPathValue($return_item_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsGet
     *
     * Get
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGet'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ModelReturn
     */
    public function returnsGet($return_id, string $contentType = self::contentTypes['returnsGet'][0])
    {
        list($response) = $this->returnsGetWithHttpInfo($return_id, $contentType);
        return $response;
    }

    /**
     * Operation returnsGetWithHttpInfo
     *
     * Get
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGet'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ModelReturn, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsGetWithHttpInfo($return_id, string $contentType = self::contentTypes['returnsGet'][0])
    {
        $request = $this->returnsGetRequest($return_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 404:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ModelReturn',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\ModelReturn',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ModelReturn',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsGetAsync
     *
     * Get
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetAsync($return_id, string $contentType = self::contentTypes['returnsGet'][0])
    {
        return $this->returnsGetAsyncWithHttpInfo($return_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsGetAsyncWithHttpInfo
     *
     * Get
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetAsyncWithHttpInfo($return_id, string $contentType = self::contentTypes['returnsGet'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\ModelReturn';
        $request = $this->returnsGetRequest($return_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsGet'
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsGetRequest($return_id, string $contentType = self::contentTypes['returnsGet'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsGet'
            );
        }


        $resourcePath = '/api/v1/fulfiller/returns/{returnId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsGetAll
     *
     * Get All
     *
     * @param  int|null $top number of elements returned by the request (optional, default to 50)
     * @param  int|null $skip offset (optional)
     * @param  string|null $filter &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;returnId&#39;, &#39;state&#39;, &#39;warehouseId&#39;, &#39;merchantId&#39;, &#39;merchantReturnNumber&#39;, &#39;fulfillerReturnNumber&#39;, &#39;customerAddress/lastname&#39;, &#39;customerAddress/company&#39;, &#39;customerAddress/city&#39;, &#39;customerAddress/email&#39;, &#39;items/returnItemId&#39;, &#39;items/jfsku&#39;, &#39;items/merchantSku&#39;, &#39;items/name&#39;, &#39;items/outboundId&#39;, &#39;items/condition&#39;&lt;/br&gt; (optional)
     * @param  string|null $select select fields (optional)
     * @param  string|null $order_by order result by field (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetAll'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return |\kruegge82\jtlffn\Model\PagedReturnResponse
     */
    public function returnsGetAll($top = 50, $skip = null, $filter = null, $select = null, $order_by = null, string $contentType = self::contentTypes['returnsGetAll'][0])
    {
        list($response) = $this->returnsGetAllWithHttpInfo($top, $skip, $filter, $select, $order_by, $contentType);
        return $response;
    }

    /**
     * Operation returnsGetAllWithHttpInfo
     *
     * Get All
     *
     * @param  int|null $top number of elements returned by the request (optional, default to 50)
     * @param  int|null $skip offset (optional)
     * @param  string|null $filter &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;returnId&#39;, &#39;state&#39;, &#39;warehouseId&#39;, &#39;merchantId&#39;, &#39;merchantReturnNumber&#39;, &#39;fulfillerReturnNumber&#39;, &#39;customerAddress/lastname&#39;, &#39;customerAddress/company&#39;, &#39;customerAddress/city&#39;, &#39;customerAddress/email&#39;, &#39;items/returnItemId&#39;, &#39;items/jfsku&#39;, &#39;items/merchantSku&#39;, &#39;items/name&#39;, &#39;items/outboundId&#39;, &#39;items/condition&#39;&lt;/br&gt; (optional)
     * @param  string|null $select select fields (optional)
     * @param  string|null $order_by order result by field (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetAll'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of |\kruegge82\jtlffn\Model\PagedReturnResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsGetAllWithHttpInfo($top = 50, $skip = null, $filter = null, $select = null, $order_by = null, string $contentType = self::contentTypes['returnsGetAll'][0])
    {
        $request = $this->returnsGetAllRequest($top, $skip, $filter, $select, $order_by, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\PagedReturnResponse',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\PagedReturnResponse',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\PagedReturnResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsGetAllAsync
     *
     * Get All
     *
     * @param  int|null $top number of elements returned by the request (optional, default to 50)
     * @param  int|null $skip offset (optional)
     * @param  string|null $filter &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;returnId&#39;, &#39;state&#39;, &#39;warehouseId&#39;, &#39;merchantId&#39;, &#39;merchantReturnNumber&#39;, &#39;fulfillerReturnNumber&#39;, &#39;customerAddress/lastname&#39;, &#39;customerAddress/company&#39;, &#39;customerAddress/city&#39;, &#39;customerAddress/email&#39;, &#39;items/returnItemId&#39;, &#39;items/jfsku&#39;, &#39;items/merchantSku&#39;, &#39;items/name&#39;, &#39;items/outboundId&#39;, &#39;items/condition&#39;&lt;/br&gt; (optional)
     * @param  string|null $select select fields (optional)
     * @param  string|null $order_by order result by field (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetAll'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetAllAsync($top = 50, $skip = null, $filter = null, $select = null, $order_by = null, string $contentType = self::contentTypes['returnsGetAll'][0])
    {
        return $this->returnsGetAllAsyncWithHttpInfo($top, $skip, $filter, $select, $order_by, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsGetAllAsyncWithHttpInfo
     *
     * Get All
     *
     * @param  int|null $top number of elements returned by the request (optional, default to 50)
     * @param  int|null $skip offset (optional)
     * @param  string|null $filter &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;returnId&#39;, &#39;state&#39;, &#39;warehouseId&#39;, &#39;merchantId&#39;, &#39;merchantReturnNumber&#39;, &#39;fulfillerReturnNumber&#39;, &#39;customerAddress/lastname&#39;, &#39;customerAddress/company&#39;, &#39;customerAddress/city&#39;, &#39;customerAddress/email&#39;, &#39;items/returnItemId&#39;, &#39;items/jfsku&#39;, &#39;items/merchantSku&#39;, &#39;items/name&#39;, &#39;items/outboundId&#39;, &#39;items/condition&#39;&lt;/br&gt; (optional)
     * @param  string|null $select select fields (optional)
     * @param  string|null $order_by order result by field (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetAll'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetAllAsyncWithHttpInfo($top = 50, $skip = null, $filter = null, $select = null, $order_by = null, string $contentType = self::contentTypes['returnsGetAll'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\PagedReturnResponse';
        $request = $this->returnsGetAllRequest($top, $skip, $filter, $select, $order_by, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsGetAll'
     *
     * @param  int|null $top number of elements returned by the request (optional, default to 50)
     * @param  int|null $skip offset (optional)
     * @param  string|null $filter &lt;h5&gt;allowed fields&lt;/h5&gt;                               &#39;returnId&#39;, &#39;state&#39;, &#39;warehouseId&#39;, &#39;merchantId&#39;, &#39;merchantReturnNumber&#39;, &#39;fulfillerReturnNumber&#39;, &#39;customerAddress/lastname&#39;, &#39;customerAddress/company&#39;, &#39;customerAddress/city&#39;, &#39;customerAddress/email&#39;, &#39;items/returnItemId&#39;, &#39;items/jfsku&#39;, &#39;items/merchantSku&#39;, &#39;items/name&#39;, &#39;items/outboundId&#39;, &#39;items/condition&#39;&lt;/br&gt; (optional)
     * @param  string|null $select select fields (optional)
     * @param  string|null $order_by order result by field (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetAll'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsGetAllRequest($top = 50, $skip = null, $filter = null, $select = null, $order_by = null, string $contentType = self::contentTypes['returnsGetAll'][0])
    {







        $resourcePath = '/api/v1/fulfiller/returns';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $top,
            '$top', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $skip,
            '$skip', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $filter,
            '$filter', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $select,
            '$select', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $order_by,
            '$orderBy', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsGetChanges
     *
     * Get Changes
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChanges'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \kruegge82\jtlffn\Model\RecentReturnChangeList
     */
    public function returnsGetChanges($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChanges'][0])
    {
        list($response) = $this->returnsGetChangesWithHttpInfo($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);
        return $response;
    }

    /**
     * Operation returnsGetChangesWithHttpInfo
     *
     * Get Changes
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChanges'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \kruegge82\jtlffn\Model\RecentReturnChangeList, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsGetChangesWithHttpInfo($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChanges'][0])
    {
        $request = $this->returnsGetChangesRequest($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\RecentReturnChangeList',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\RecentReturnChangeList',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\RecentReturnChangeList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsGetChangesAsync
     *
     * Get Changes
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChanges'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetChangesAsync($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChanges'][0])
    {
        return $this->returnsGetChangesAsyncWithHttpInfo($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsGetChangesAsyncWithHttpInfo
     *
     * Get Changes
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChanges'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetChangesAsyncWithHttpInfo($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChanges'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\RecentReturnChangeList';
        $request = $this->returnsGetChangesRequest($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsGetChanges'
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChanges'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsGetChangesRequest($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChanges'][0])
    {







        $resourcePath = '/api/v1/fulfiller/returns/changes';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from_date,
            'fromDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to_date,
            'toDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ignore_own_application_id,
            'ignoreOwnApplicationId', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ignore_own_user_id,
            'ignoreOwnUserId', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsGetChangesFromReturn
     *
     * Get Changes for specific for specific Return
     *
     * @param  string $return_id  (required)
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChangesFromReturn'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \kruegge82\jtlffn\Model\RecentReturnChangeList
     */
    public function returnsGetChangesFromReturn($return_id, $from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChangesFromReturn'][0])
    {
        list($response) = $this->returnsGetChangesFromReturnWithHttpInfo($return_id, $from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);
        return $response;
    }

    /**
     * Operation returnsGetChangesFromReturnWithHttpInfo
     *
     * Get Changes for specific for specific Return
     *
     * @param  string $return_id  (required)
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChangesFromReturn'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \kruegge82\jtlffn\Model\RecentReturnChangeList, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsGetChangesFromReturnWithHttpInfo($return_id, $from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChangesFromReturn'][0])
    {
        $request = $this->returnsGetChangesFromReturnRequest($return_id, $from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\RecentReturnChangeList',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\RecentReturnChangeList',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\RecentReturnChangeList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsGetChangesFromReturnAsync
     *
     * Get Changes for specific for specific Return
     *
     * @param  string $return_id  (required)
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChangesFromReturn'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetChangesFromReturnAsync($return_id, $from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChangesFromReturn'][0])
    {
        return $this->returnsGetChangesFromReturnAsyncWithHttpInfo($return_id, $from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsGetChangesFromReturnAsyncWithHttpInfo
     *
     * Get Changes for specific for specific Return
     *
     * @param  string $return_id  (required)
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChangesFromReturn'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetChangesFromReturnAsyncWithHttpInfo($return_id, $from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChangesFromReturn'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\RecentReturnChangeList';
        $request = $this->returnsGetChangesFromReturnRequest($return_id, $from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsGetChangesFromReturn'
     *
     * @param  string $return_id  (required)
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetChangesFromReturn'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsGetChangesFromReturnRequest($return_id, $from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetChangesFromReturn'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsGetChangesFromReturn'
            );
        }







        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/changes';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from_date,
            'fromDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to_date,
            'toDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ignore_own_application_id,
            'ignoreOwnApplicationId', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ignore_own_user_id,
            'ignoreOwnUserId', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsGetReturnItem
     *
     * Get Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ReturnItem
     */
    public function returnsGetReturnItem($return_id, $return_item_id, string $contentType = self::contentTypes['returnsGetReturnItem'][0])
    {
        list($response) = $this->returnsGetReturnItemWithHttpInfo($return_id, $return_item_id, $contentType);
        return $response;
    }

    /**
     * Operation returnsGetReturnItemWithHttpInfo
     *
     * Get Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ReturnItem, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsGetReturnItemWithHttpInfo($return_id, $return_item_id, string $contentType = self::contentTypes['returnsGetReturnItem'][0])
    {
        $request = $this->returnsGetReturnItemRequest($return_id, $return_item_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 404:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ReturnItem',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\ReturnItem',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ReturnItem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsGetReturnItemAsync
     *
     * Get Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetReturnItemAsync($return_id, $return_item_id, string $contentType = self::contentTypes['returnsGetReturnItem'][0])
    {
        return $this->returnsGetReturnItemAsyncWithHttpInfo($return_id, $return_item_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsGetReturnItemAsyncWithHttpInfo
     *
     * Get Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetReturnItemAsyncWithHttpInfo($return_id, $return_item_id, string $contentType = self::contentTypes['returnsGetReturnItem'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\ReturnItem';
        $request = $this->returnsGetReturnItemRequest($return_id, $return_item_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsGetReturnItem'
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsGetReturnItemRequest($return_id, $return_item_id, string $contentType = self::contentTypes['returnsGetReturnItem'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsGetReturnItem'
            );
        }

        // verify the required parameter 'return_item_id' is set
        if ($return_item_id === null || (is_array($return_item_id) && count($return_item_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_item_id when calling returnsGetReturnItem'
            );
        }


        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/items/{returnItemId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }
        // path params
        if ($return_item_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnItemId' . '}',
                ObjectSerializer::toPathValue($return_item_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsGetUpdates
     *
     * Get Updates
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetUpdates'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \kruegge82\jtlffn\Model\RecentReturnList
     */
    public function returnsGetUpdates($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetUpdates'][0])
    {
        list($response) = $this->returnsGetUpdatesWithHttpInfo($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);
        return $response;
    }

    /**
     * Operation returnsGetUpdatesWithHttpInfo
     *
     * Get Updates
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetUpdates'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \kruegge82\jtlffn\Model\RecentReturnList, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsGetUpdatesWithHttpInfo($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetUpdates'][0])
    {
        $request = $this->returnsGetUpdatesRequest($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\RecentReturnList',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\RecentReturnList',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\RecentReturnList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsGetUpdatesAsync
     *
     * Get Updates
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetUpdates'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetUpdatesAsync($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetUpdates'][0])
    {
        return $this->returnsGetUpdatesAsyncWithHttpInfo($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsGetUpdatesAsyncWithHttpInfo
     *
     * Get Updates
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetUpdates'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsGetUpdatesAsyncWithHttpInfo($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetUpdates'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\RecentReturnList';
        $request = $this->returnsGetUpdatesRequest($from_date, $to_date, $page, $ignore_own_application_id, $ignore_own_user_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsGetUpdates'
     *
     * @param  string|null $from_date The start date of the timeframe. (optional)
     * @param  string|null $to_date The end date of the timeframe. (optional)
     * @param  int|null $page Page number. (optional, default to 1)
     * @param  bool|null $ignore_own_application_id If true, modifications from your own application-id will not be returned (optional, default to false)
     * @param  bool|null $ignore_own_user_id If true, modifications from your own user-id will not be returned (optional, default to false)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsGetUpdates'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsGetUpdatesRequest($from_date = null, $to_date = null, $page = 1, $ignore_own_application_id = false, $ignore_own_user_id = false, string $contentType = self::contentTypes['returnsGetUpdates'][0])
    {







        $resourcePath = '/api/v1/fulfiller/returns/updates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from_date,
            'fromDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to_date,
            'toDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ignore_own_application_id,
            'ignoreOwnApplicationId', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ignore_own_user_id,
            'ignoreOwnUserId', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsLock
     *
     * Lock
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsLock'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function returnsLock($return_id, $object_version = null, string $contentType = self::contentTypes['returnsLock'][0])
    {
        $this->returnsLockWithHttpInfo($return_id, $object_version, $contentType);
    }

    /**
     * Operation returnsLockWithHttpInfo
     *
     * Lock
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsLock'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsLockWithHttpInfo($return_id, $object_version = null, string $contentType = self::contentTypes['returnsLock'][0])
    {
        $request = $this->returnsLockRequest($return_id, $object_version, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsLockAsync
     *
     * Lock
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsLock'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsLockAsync($return_id, $object_version = null, string $contentType = self::contentTypes['returnsLock'][0])
    {
        return $this->returnsLockAsyncWithHttpInfo($return_id, $object_version, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsLockAsyncWithHttpInfo
     *
     * Lock
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsLock'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsLockAsyncWithHttpInfo($return_id, $object_version = null, string $contentType = self::contentTypes['returnsLock'][0])
    {
        $returnType = '';
        $request = $this->returnsLockRequest($return_id, $object_version, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsLock'
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsLock'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsLockRequest($return_id, $object_version = null, string $contentType = self::contentTypes['returnsLock'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsLock'
            );
        }



        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/lock';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_version,
            'objectVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PUT',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsPatch
     *
     * Patch
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnRequest|null $update_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatch'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function returnsPatch($return_id, $object_version = null, $update_return_request = null, string $contentType = self::contentTypes['returnsPatch'][0])
    {
        $this->returnsPatchWithHttpInfo($return_id, $object_version, $update_return_request, $contentType);
    }

    /**
     * Operation returnsPatchWithHttpInfo
     *
     * Patch
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnRequest|null $update_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatch'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsPatchWithHttpInfo($return_id, $object_version = null, $update_return_request = null, string $contentType = self::contentTypes['returnsPatch'][0])
    {
        $request = $this->returnsPatchRequest($return_id, $object_version, $update_return_request, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsPatchAsync
     *
     * Patch
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnRequest|null $update_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPatchAsync($return_id, $object_version = null, $update_return_request = null, string $contentType = self::contentTypes['returnsPatch'][0])
    {
        return $this->returnsPatchAsyncWithHttpInfo($return_id, $object_version, $update_return_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsPatchAsyncWithHttpInfo
     *
     * Patch
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnRequest|null $update_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPatchAsyncWithHttpInfo($return_id, $object_version = null, $update_return_request = null, string $contentType = self::contentTypes['returnsPatch'][0])
    {
        $returnType = '';
        $request = $this->returnsPatchRequest($return_id, $object_version, $update_return_request, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsPatch'
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnRequest|null $update_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsPatchRequest($return_id, $object_version = null, $update_return_request = null, string $contentType = self::contentTypes['returnsPatch'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsPatch'
            );
        }




        $resourcePath = '/api/v1/fulfiller/returns/{returnId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_version,
            'objectVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_return_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_return_request));
            } else {
                $httpBody = $update_return_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsPatchReturnItem
     *
     * Patch Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id Return item identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnItemRequest|null $update_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatchReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function returnsPatchReturnItem($return_id, $return_item_id, $object_version = null, $update_return_item_request = null, string $contentType = self::contentTypes['returnsPatchReturnItem'][0])
    {
        $this->returnsPatchReturnItemWithHttpInfo($return_id, $return_item_id, $object_version, $update_return_item_request, $contentType);
    }

    /**
     * Operation returnsPatchReturnItemWithHttpInfo
     *
     * Patch Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id Return item identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnItemRequest|null $update_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatchReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsPatchReturnItemWithHttpInfo($return_id, $return_item_id, $object_version = null, $update_return_item_request = null, string $contentType = self::contentTypes['returnsPatchReturnItem'][0])
    {
        $request = $this->returnsPatchReturnItemRequest($return_id, $return_item_id, $object_version, $update_return_item_request, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsPatchReturnItemAsync
     *
     * Patch Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id Return item identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnItemRequest|null $update_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatchReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPatchReturnItemAsync($return_id, $return_item_id, $object_version = null, $update_return_item_request = null, string $contentType = self::contentTypes['returnsPatchReturnItem'][0])
    {
        return $this->returnsPatchReturnItemAsyncWithHttpInfo($return_id, $return_item_id, $object_version, $update_return_item_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsPatchReturnItemAsyncWithHttpInfo
     *
     * Patch Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id Return item identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnItemRequest|null $update_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatchReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPatchReturnItemAsyncWithHttpInfo($return_id, $return_item_id, $object_version = null, $update_return_item_request = null, string $contentType = self::contentTypes['returnsPatchReturnItem'][0])
    {
        $returnType = '';
        $request = $this->returnsPatchReturnItemRequest($return_id, $return_item_id, $object_version, $update_return_item_request, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsPatchReturnItem'
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id Return item identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\UpdateReturnItemRequest|null $update_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPatchReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsPatchReturnItemRequest($return_id, $return_item_id, $object_version = null, $update_return_item_request = null, string $contentType = self::contentTypes['returnsPatchReturnItem'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsPatchReturnItem'
            );
        }

        // verify the required parameter 'return_item_id' is set
        if ($return_item_id === null || (is_array($return_item_id) && count($return_item_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_item_id when calling returnsPatchReturnItem'
            );
        }




        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/items/{returnItemId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_version,
            'objectVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }
        // path params
        if ($return_item_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnItemId' . '}',
                ObjectSerializer::toPathValue($return_item_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_return_item_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_return_item_request));
            } else {
                $httpBody = $update_return_item_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsPost
     *
     * Post
     *
     * @param  \kruegge82\jtlffn\Model\CreateReturnRequest|null $create_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPost'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ModelReturn
     */
    public function returnsPost($create_return_request = null, string $contentType = self::contentTypes['returnsPost'][0])
    {
        list($response) = $this->returnsPostWithHttpInfo($create_return_request, $contentType);
        return $response;
    }

    /**
     * Operation returnsPostWithHttpInfo
     *
     * Post
     *
     * @param  \kruegge82\jtlffn\Model\CreateReturnRequest|null $create_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPost'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ModelReturn, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsPostWithHttpInfo($create_return_request = null, string $contentType = self::contentTypes['returnsPost'][0])
    {
        $request = $this->returnsPostRequest($create_return_request, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 201:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ModelReturn',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\ModelReturn',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ModelReturn',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsPostAsync
     *
     * Post
     *
     * @param  \kruegge82\jtlffn\Model\CreateReturnRequest|null $create_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPostAsync($create_return_request = null, string $contentType = self::contentTypes['returnsPost'][0])
    {
        return $this->returnsPostAsyncWithHttpInfo($create_return_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsPostAsyncWithHttpInfo
     *
     * Post
     *
     * @param  \kruegge82\jtlffn\Model\CreateReturnRequest|null $create_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPostAsyncWithHttpInfo($create_return_request = null, string $contentType = self::contentTypes['returnsPost'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\ModelReturn';
        $request = $this->returnsPostRequest($create_return_request, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsPost'
     *
     * @param  \kruegge82\jtlffn\Model\CreateReturnRequest|null $create_return_request Return details (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsPostRequest($create_return_request = null, string $contentType = self::contentTypes['returnsPost'][0])
    {



        $resourcePath = '/api/v1/fulfiller/returns';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_return_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_return_request));
            } else {
                $httpBody = $create_return_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsPostIncomingReturnItem
     *
     * Post Incoming Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateIncomingReturnItemRequest|null $create_incoming_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostIncomingReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\StockChange
     */
    public function returnsPostIncomingReturnItem($return_id, $return_item_id, $object_version = null, $create_incoming_return_item_request = null, string $contentType = self::contentTypes['returnsPostIncomingReturnItem'][0])
    {
        list($response) = $this->returnsPostIncomingReturnItemWithHttpInfo($return_id, $return_item_id, $object_version, $create_incoming_return_item_request, $contentType);
        return $response;
    }

    /**
     * Operation returnsPostIncomingReturnItemWithHttpInfo
     *
     * Post Incoming Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateIncomingReturnItemRequest|null $create_incoming_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostIncomingReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\StockChange, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsPostIncomingReturnItemWithHttpInfo($return_id, $return_item_id, $object_version = null, $create_incoming_return_item_request = null, string $contentType = self::contentTypes['returnsPostIncomingReturnItem'][0])
    {
        $request = $this->returnsPostIncomingReturnItemRequest($return_id, $return_item_id, $object_version, $create_incoming_return_item_request, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 201:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\StockChange',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\StockChange',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\StockChange',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsPostIncomingReturnItemAsync
     *
     * Post Incoming Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateIncomingReturnItemRequest|null $create_incoming_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostIncomingReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPostIncomingReturnItemAsync($return_id, $return_item_id, $object_version = null, $create_incoming_return_item_request = null, string $contentType = self::contentTypes['returnsPostIncomingReturnItem'][0])
    {
        return $this->returnsPostIncomingReturnItemAsyncWithHttpInfo($return_id, $return_item_id, $object_version, $create_incoming_return_item_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsPostIncomingReturnItemAsyncWithHttpInfo
     *
     * Post Incoming Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateIncomingReturnItemRequest|null $create_incoming_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostIncomingReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPostIncomingReturnItemAsyncWithHttpInfo($return_id, $return_item_id, $object_version = null, $create_incoming_return_item_request = null, string $contentType = self::contentTypes['returnsPostIncomingReturnItem'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\StockChange';
        $request = $this->returnsPostIncomingReturnItemRequest($return_id, $return_item_id, $object_version, $create_incoming_return_item_request, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsPostIncomingReturnItem'
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateIncomingReturnItemRequest|null $create_incoming_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostIncomingReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsPostIncomingReturnItemRequest($return_id, $return_item_id, $object_version = null, $create_incoming_return_item_request = null, string $contentType = self::contentTypes['returnsPostIncomingReturnItem'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsPostIncomingReturnItem'
            );
        }

        // verify the required parameter 'return_item_id' is set
        if ($return_item_id === null || (is_array($return_item_id) && count($return_item_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_item_id when calling returnsPostIncomingReturnItem'
            );
        }




        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/items/{returnItemId}/incomming-goods';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_version,
            'objectVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }
        // path params
        if ($return_item_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnItemId' . '}',
                ObjectSerializer::toPathValue($return_item_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_incoming_return_item_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_incoming_return_item_request));
            } else {
                $httpBody = $create_incoming_return_item_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsPostReturnItem
     *
     * Post Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemRequest|null $create_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ReturnItem
     */
    public function returnsPostReturnItem($return_id, $object_version = null, $create_return_item_request = null, string $contentType = self::contentTypes['returnsPostReturnItem'][0])
    {
        list($response) = $this->returnsPostReturnItemWithHttpInfo($return_id, $object_version, $create_return_item_request, $contentType);
        return $response;
    }

    /**
     * Operation returnsPostReturnItemWithHttpInfo
     *
     * Post Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemRequest|null $create_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ReturnItem, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsPostReturnItemWithHttpInfo($return_id, $object_version = null, $create_return_item_request = null, string $contentType = self::contentTypes['returnsPostReturnItem'][0])
    {
        $request = $this->returnsPostReturnItemRequest($return_id, $object_version, $create_return_item_request, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 201:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ReturnItem',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\ReturnItem',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ReturnItem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsPostReturnItemAsync
     *
     * Post Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemRequest|null $create_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPostReturnItemAsync($return_id, $object_version = null, $create_return_item_request = null, string $contentType = self::contentTypes['returnsPostReturnItem'][0])
    {
        return $this->returnsPostReturnItemAsyncWithHttpInfo($return_id, $object_version, $create_return_item_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsPostReturnItemAsyncWithHttpInfo
     *
     * Post Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemRequest|null $create_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsPostReturnItemAsyncWithHttpInfo($return_id, $object_version = null, $create_return_item_request = null, string $contentType = self::contentTypes['returnsPostReturnItem'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\ReturnItem';
        $request = $this->returnsPostReturnItemRequest($return_id, $object_version, $create_return_item_request, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsPostReturnItem'
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemRequest|null $create_return_item_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsPostReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsPostReturnItemRequest($return_id, $object_version = null, $create_return_item_request = null, string $contentType = self::contentTypes['returnsPostReturnItem'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsPostReturnItem'
            );
        }




        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/items';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_version,
            'objectVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_return_item_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_return_item_request));
            } else {
                $httpBody = $create_return_item_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsSplitReturnItem
     *
     * Split Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemSplitRequest|null $create_return_item_split_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsSplitReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ReturnItem
     */
    public function returnsSplitReturnItem($return_id, $return_item_id, $object_version = null, $create_return_item_split_request = null, string $contentType = self::contentTypes['returnsSplitReturnItem'][0])
    {
        list($response) = $this->returnsSplitReturnItemWithHttpInfo($return_id, $return_item_id, $object_version, $create_return_item_split_request, $contentType);
        return $response;
    }

    /**
     * Operation returnsSplitReturnItemWithHttpInfo
     *
     * Split Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemSplitRequest|null $create_return_item_split_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsSplitReturnItem'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of |\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ErrorResponse|\kruegge82\jtlffn\Model\ReturnItem, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsSplitReturnItemWithHttpInfo($return_id, $return_item_id, $object_version = null, $create_return_item_split_request = null, string $contentType = self::contentTypes['returnsSplitReturnItem'][0])
    {
        $request = $this->returnsSplitReturnItemRequest($return_id, $return_item_id, $object_version, $create_return_item_split_request, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $request,
                        $response,
                    );
                case 201:
                    return $this->handleResponseWithDataType(
                        '\kruegge82\jtlffn\Model\ReturnItem',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\kruegge82\jtlffn\Model\ReturnItem',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ReturnItem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsSplitReturnItemAsync
     *
     * Split Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemSplitRequest|null $create_return_item_split_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsSplitReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsSplitReturnItemAsync($return_id, $return_item_id, $object_version = null, $create_return_item_split_request = null, string $contentType = self::contentTypes['returnsSplitReturnItem'][0])
    {
        return $this->returnsSplitReturnItemAsyncWithHttpInfo($return_id, $return_item_id, $object_version, $create_return_item_split_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsSplitReturnItemAsyncWithHttpInfo
     *
     * Split Return Item
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemSplitRequest|null $create_return_item_split_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsSplitReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsSplitReturnItemAsyncWithHttpInfo($return_id, $return_item_id, $object_version = null, $create_return_item_split_request = null, string $contentType = self::contentTypes['returnsSplitReturnItem'][0])
    {
        $returnType = '\kruegge82\jtlffn\Model\ReturnItem';
        $request = $this->returnsSplitReturnItemRequest($return_id, $return_item_id, $object_version, $create_return_item_split_request, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsSplitReturnItem'
     *
     * @param  string $return_id Return identifer (required)
     * @param  string $return_item_id  (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  \kruegge82\jtlffn\Model\CreateReturnItemSplitRequest|null $create_return_item_split_request  (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsSplitReturnItem'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsSplitReturnItemRequest($return_id, $return_item_id, $object_version = null, $create_return_item_split_request = null, string $contentType = self::contentTypes['returnsSplitReturnItem'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsSplitReturnItem'
            );
        }

        // verify the required parameter 'return_item_id' is set
        if ($return_item_id === null || (is_array($return_item_id) && count($return_item_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_item_id when calling returnsSplitReturnItem'
            );
        }




        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/items/{returnItemId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_version,
            'objectVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }
        // path params
        if ($return_item_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnItemId' . '}',
                ObjectSerializer::toPathValue($return_item_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_return_item_split_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_return_item_split_request));
            } else {
                $httpBody = $create_return_item_split_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation returnsUnlock
     *
     * Unlock
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsUnlock'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function returnsUnlock($return_id, $object_version = null, string $contentType = self::contentTypes['returnsUnlock'][0])
    {
        $this->returnsUnlockWithHttpInfo($return_id, $object_version, $contentType);
    }

    /**
     * Operation returnsUnlockWithHttpInfo
     *
     * Unlock
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsUnlock'] to see the possible values for this operation
     *
     * @throws \kruegge82\jtlffn\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function returnsUnlockWithHttpInfo($return_id, $object_version = null, string $contentType = self::contentTypes['returnsUnlock'][0])
    {
        $request = $this->returnsUnlockRequest($return_id, $object_version, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\jtlffn\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation returnsUnlockAsync
     *
     * Unlock
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsUnlock'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsUnlockAsync($return_id, $object_version = null, string $contentType = self::contentTypes['returnsUnlock'][0])
    {
        return $this->returnsUnlockAsyncWithHttpInfo($return_id, $object_version, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation returnsUnlockAsyncWithHttpInfo
     *
     * Unlock
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsUnlock'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnsUnlockAsyncWithHttpInfo($return_id, $object_version = null, string $contentType = self::contentTypes['returnsUnlock'][0])
    {
        $returnType = '';
        $request = $this->returnsUnlockRequest($return_id, $object_version, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'returnsUnlock'
     *
     * @param  string $return_id Return identifer (required)
     * @param  \DateTime|null $object_version Last known modification date of this return. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnsUnlock'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnsUnlockRequest($return_id, $object_version = null, string $contentType = self::contentTypes['returnsUnlock'][0])
    {

        // verify the required parameter 'return_id' is set
        if ($return_id === null || (is_array($return_id) && count($return_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $return_id when calling returnsUnlock'
            );
        }



        $resourcePath = '/api/v1/fulfiller/returns/{returnId}/unlock';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $object_version,
            'objectVersion', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($return_id !== null) {
            $resourcePath = str_replace(
                '{' . 'returnId' . '}',
                ObjectSerializer::toPathValue($return_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PUT',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    private function handleResponseWithDataType(
        string $dataType,
        RequestInterface $request,
        ResponseInterface $response
    ): array {
        if ($dataType === '\SplFileObject') {
            $content = $response->getBody(); //stream goes to serializer
        } else {
            $content = (string) $response->getBody();
            if ($dataType !== 'string') {
                try {
                    $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                } catch (\JsonException $exception) {
                    throw new ApiException(
                        sprintf(
                            'Error JSON decoding server response (%s)',
                            $request->getUri()
                        ),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                        $content
                    );
                }
            }
        }

        return [
            ObjectSerializer::deserialize($content, $dataType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    private function responseWithinRangeCode(
        string $rangeCode,
        int $statusCode
    ): bool {
        $left = (int) ($rangeCode[0].'00');
        $right = (int) ($rangeCode[0].'99');

        return $statusCode >= $left && $statusCode <= $right;
    }
}
