<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Responses\Transcoder;

use JMS\Serializer\Annotation\Type;

class JobBasicResponse
{
    /**
     * @var \DateTime
     *
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    private $created_on;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $id;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $status;

    public function getCreatedOn(): \DateTime
    {
        return $this->created_on;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
