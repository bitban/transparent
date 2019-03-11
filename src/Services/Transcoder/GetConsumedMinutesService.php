<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services\Transcoder;

use Bitban\Transparent\Config\Company;
use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Responses\Transcoder\ConsumedMinutesResponse;
use Bitban\Transparent\Services\HttpClient;
use JMS\Serializer\Serializer;

class GetConsumedMinutesService
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

    private function getFilters(\DateTime $from, \DateTime $to): string
    {
        $filters = [
            "timestamp" => [
                "from" => $from->format("Ymd H:i:s"),
                "to" => $to->format("Ymd H:i:s"),
            ]
        ];

        return json_encode($filters);
    }

    private function getUrl(\DateTime $from, \DateTime $to): string
    {
        $companyId = $this->company->getCompanyId();
        $filters = $this->getFilters($from, $to);
        return "https://api.transparentcdn.com/v1/media/{$companyId}/transcoding/consumed_minutes/?filters=" . $filters;
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @return ConsumedMinutesResponse
     * @throws TransparentException
     */
    public function getConsumedMinutes(\DateTime $from, \DateTime $to): ConsumedMinutesResponse
    {
        $url = $this->getUrl($from, $to);
        $json = $this->httpClient->get($url);

        return $this->serializer->deserialize($json, ConsumedMinutesResponse::class, "json");
    }
}
