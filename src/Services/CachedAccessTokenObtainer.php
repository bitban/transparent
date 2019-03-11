<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services;

use Bitban\Transparent\Exceptions\TransparentException;
use League\OAuth2\Client\Token\AccessTokenInterface;

class CachedAccessTokenObtainer
{
    /** @var AccessTokenObtainer */
    private $accessTokenObtainer;

    /** @var AccessTokenInterface|null */
    private $accessToken;

    public function __construct(AccessTokenObtainer $accessTokenObtainer)
    {
        $this->accessTokenObtainer = $accessTokenObtainer;
    }

    /**
     * @return AccessTokenInterface
     * @throws TransparentException
     */
    public function getAccessToken(): AccessTokenInterface
    {
        if (is_null($this->accessToken)
            // Usamos un margen de unos minutos para evitar problemas
            || $this->accessToken->getExpires() - time() < 5 * 60
        ) {
            $this->accessToken = $this->accessTokenObtainer->getAccessToken();
        }

        return $this->accessToken;
    }
}
