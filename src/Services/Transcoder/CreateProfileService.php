<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services\Transcoder;

use Bitban\Transparent\Config\Company;
use Bitban\Transparent\Exceptions\TransparentException;
use Bitban\Transparent\Payloads\Transcoder\CreateProfilePayload;
use Bitban\Transparent\Services\HttpClient;
use JMS\Serializer\Serializer;

class CreateProfileService
{
    /** @var HttpClient */
    private $httpClient;

    /** @var Company */
    private $company;

    /** @var Serializer */
    private $serializer;

    public function __construct(
        HttpClient $httpClient,
        Company $company,
        Serializer $serializer
    ) {
        $this->httpClient = $httpClient;
        $this->company = $company;
        $this->serializer = $serializer;
    }

    private function getUrl(): string
    {
        $companyId = $this->company->getCompanyId();
        return "https://api.transparentcdn.com/v1/media/{$companyId}/transcoding_profiles/";
    }

    /**
     * @param CreateProfilePayload $createProfilePayload
     * @return array
     */
    private function getJsonPayload(CreateProfilePayload $createProfilePayload): array
    {
        $jsonPayload = json_decode($this->serializer->serialize($createProfilePayload, "json"), true);

        // ODMPPHE: el serializer quita las claves que sean null
        if (!array_key_exists("video_width", $jsonPayload)) {
            $jsonPayload["video_width"] = null;
        }
        if (!array_key_exists("video_height", $jsonPayload)) {
            $jsonPayload["video_height"] = null;
        }

        return $jsonPayload;
    }

    /**
     * @param CreateProfilePayload $createProfilePayload
     * @return string
     * @throws TransparentException
     */
    public function createProfile(CreateProfilePayload $createProfilePayload): string
    {
        $url = $this->getUrl();
        $jsonPayload = $this->getJsonPayload($createProfilePayload);

        // TODO: terminar

        $jsonResponse = $this->httpClient->postJson($url, $jsonPayload);

        die($jsonResponse);
    }
}
