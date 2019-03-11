<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services;

use Bitban\Transparent\Config\Company;
use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Responses\UrlsInvalidationResponse;
use JMS\Serializer\Serializer;

class UrlInvalidator
{
    /** @var HttpClient */
    private $httpClient;

    /** @var Company */
    private $company;

    /** @var Serializer */
    private $serializer;

    public function __construct(HttpClient $httpClient, Company $company, Serializer $serializer)
    {
        $this->httpClient = $httpClient;
        $this->company = $company;
        $this->serializer = $serializer;
    }

    private function getUrl(): string
    {
        $companyId = $this->company->getCompanyId();
        return "https://api.transparentcdn.com/v1/companies/{$companyId}/invalidate/";
    }

    /**
     * @param array $urls
     * @return UrlsInvalidationResponse
     * @throws TransparentException
     */
    public function invalidateUrls(array $urls): UrlsInvalidationResponse
    {
        $url = $this->getUrl();
        $jsonPayload = ["urls" => $urls];
        $json = $this->httpClient->postJson($url, $jsonPayload);

        return $this->serializer->deserialize($json, UrlsInvalidationResponse::class, "json");
    }

    /**
     *
     * ATENCION ATENCION ATENCION ATENCION ATENCION ACHTUNG!!!!!
     * ATENCION ATENCION ATENCION ATENCION ATENCION ACHTUNG!!!!!
     * ATENCION ATENCION ATENCION ATENCION ATENCION ACHTUNG!!!!!
     * ATENCION ATENCION ATENCION ATENCION ATENCION ACHTUNG!!!!!
     *
     * https://soporte.transparentcdn.com/projects/incidencias/wiki/Invalidaci%C3%B3n
     *
     * "IMPORTANTE: Recomendamos que las invalidaciones, en la medida de lo posible, se realicen por el método PURGE y
     * usar el método BAN solo para invalidaciones recursivas cuando no haya otra opción.
     * Puede provocar graves problemas de rendimiento en el site"
     *
     * @param array $urls
     * @return UrlsInvalidationResponse
     * @throws TransparentException
     */
    public function recursiveInvalidateUrls(array $urls): UrlsInvalidationResponse
    {
        $url = $this->getUrl();
        $jsonPayload = [
            "urls" => $urls,
            "ban" => 1
        ];
        $json = $this->httpClient->postJson($url, $jsonPayload);

        return $this->serializer->deserialize($json, UrlsInvalidationResponse::class, "json");
    }
}
