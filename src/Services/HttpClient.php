<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Services;

use Bitban\Transparent\Exceptions\TransparentException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class HttpClient
{
    /** @var Client */
    private $guzzleClient;

    /** @var CachedAccessTokenObtainer */
    private $cachedAccessTokenObtainer;

    public function __construct(Client $guzzleClient, CachedAccessTokenObtainer $cachedAccessTokenObtainer)
    {
        $this->guzzleClient = $guzzleClient;
        $this->cachedAccessTokenObtainer = $cachedAccessTokenObtainer;
    }

    /**
     * @return array
     * @throws TransparentException
     */
    private function getHeaders(): array
    {
        $accessToken = $this->cachedAccessTokenObtainer->getAccessToken()->getToken();
        $headers = [
            "Authorization" => "Bearer $accessToken",
        ];

        return $headers;
    }

    /**
     * @param string $url
     * @return string
     * @throws TransparentException
     */
    public function get(string $url): string
    {
        try {
            $options = [
                RequestOptions::HEADERS => $this->getHeaders(),
            ];
            $response = $this->guzzleClient->get($url, $options);

            return $response->getBody();
        } /** @noinspection PhpRedundantCatchClauseInspection */ catch (GuzzleException $e) {
            throw TransparentException::buildWithException($e);
        }
    }

    /**
     * @param string $url
     * @param array $jsonPayload
     * @return string
     * @throws TransparentException
     */
    public function postJson(string $url, array $jsonPayload): string
    {
        try {
            $options = [
                RequestOptions::HEADERS => $this->getHeaders(),
                RequestOptions::JSON => $jsonPayload,
            ];

            $response = $this->guzzleClient->post($url, $options);

            return $response->getBody();
        } /** @noinspection PhpRedundantCatchClauseInspection */ catch (GuzzleException $e) {
            throw TransparentException::buildWithException($e);
        }
    }

    /**
     * @param string $url
     * @param array $postData
     * @return string
     * @throws TransparentException
     */
    public function postForm(string $url, array $postData): string
    {
        try {
            $options = [
                RequestOptions::HEADERS => $this->getHeaders(),
                RequestOptions::FORM_PARAMS => $postData,
            ];

            $response = $this->guzzleClient->post($url, $options);

            return $response->getBody();
        } /** @noinspection PhpRedundantCatchClauseInspection */ catch (GuzzleException $e) {
            throw TransparentException::buildWithException($e);
        }
    }
}
