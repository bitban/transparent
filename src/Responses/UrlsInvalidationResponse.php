<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Responses;

use JMS\Serializer\Annotation\Type;

class UrlsInvalidationResponse
{
    /**
     * @var string[]
     *
     * @Type("array<string>")
     */
    private $urls_to_send;

    /**
     * @var string[]
     *
     * @Type("array<string>")
     */
    private $locked_urls;

    /**
     * @return string[]
     */
    public function getUrlsToSend(): array
    {
        return $this->urls_to_send;
    }

    /**
     * @return string[]
     */
    public function getLockedUrls(): array
    {
        return $this->locked_urls;
    }
}
