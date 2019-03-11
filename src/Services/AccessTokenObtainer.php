<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services;

use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Config\Credentials;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessTokenInterface;

class AccessTokenObtainer
{
    private const URL_ACCESS_TOKEN = "https://api.transparentcdn.com/v1/oauth2/access_token/";

    /** @var Credentials */
    private $credentials;

    public function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @return AccessTokenInterface
     * @throws TransparentException
     */
    public function getAccessToken(): AccessTokenInterface
    {
        $provider = new GenericProvider([
            "clientId" => $this->credentials->getClientId(),
            "clientSecret" => $this->credentials->getClientSecret(),
            "urlAccessToken" => self::URL_ACCESS_TOKEN,
            "urlAuthorize" => "",
            "urlResourceOwnerDetails" => ""
        ]);

        try {
            return $provider->getAccessToken("client_credentials");

        } catch (IdentityProviderException $e) {

            throw TransparentException::buildWithException($e);
        }
    }
}
