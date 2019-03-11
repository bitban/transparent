<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services\Transcoder;

use Bitban\Transparent\Config\Company;
use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Responses\Transcoder\JobInfoResponse;
use Bitban\Transparent\Services\HttpClient;
use JMS\Serializer\Serializer;

class GetJobInfoService
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

    private function getUrl(string $jobId): string
    {
        $companyId = $this->company->getCompanyId();
        return "https://api.transparentcdn.com/v1/media/{$companyId}/transcode/{$jobId}";
    }

    /**
     * @param string $jobId
     * @return JobInfoResponse
     * @throws TransparentException
     */
    public function getJobInfo(string $jobId): JobInfoResponse
    {
        $url = $this->getUrl($jobId);
        $json = $this->httpClient->get($url);

        return $this->serializer->deserialize($json, JobInfoResponse::class, "json");
    }
}
