<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services\Transcoder;

use Bitban\Transparent\Config\Company;
use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Payloads\Transcoder\CreateJobPayload;
use Bitban\Transparent\Services\HttpClient;
use JMS\Serializer\Serializer;
use Psr\Log\LoggerInterface;

class CreateJobService
{
    /** @var HttpClient */
    private $httpClient;

    /** @var Company */
    private $company;

    /** @var Serializer */
    private $serializer;

    /** @var CreateJobPayloadSerializer */
    private $createJobPayloadSerializer;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(
        HttpClient $httpClient,
        Company $company,
        Serializer $serializer,
        CreateJobPayloadSerializer $createJobPayloadSerializer,
        LoggerInterface $logger
    ) {
        $this->httpClient = $httpClient;
        $this->company = $company;
        $this->serializer = $serializer;
        $this->createJobPayloadSerializer = $createJobPayloadSerializer;
        $this->logger = $logger;
    }

    private function getUrl(): string
    {
        $companyId = $this->company->getCompanyId();
        return "https://api.transparentcdn.com/v1/media/{$companyId}/transcode/";
    }

    /**
     * @param CreateJobPayload $createJobPayload
     * @return string
     * @throws TransparentException
     */
    public function createJob(CreateJobPayload $createJobPayload): string
    {
        $url = $this->getUrl();
        $jsonPayload = $this->createJobPayloadSerializer->serialize($createJobPayload);

        $postData = ["order" => json_encode($jsonPayload)];
        $response = $this->httpClient->postForm($url, $postData);

        if (!preg_match("/#([^\s]+)/", $response, $matches)) {
            throw new TransparentException("Unexpected createJob response '$response'");
        }

        $this->logger->info("Created transcoding job calling to url $url. Job payload " . json_encode($postData). " Transparent response " . $response);

        return $matches[1];
    }
}
