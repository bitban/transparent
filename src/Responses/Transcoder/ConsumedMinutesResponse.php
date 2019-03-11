<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Responses\Transcoder;

use JMS\Serializer\Annotation\Type;

class ConsumedMinutesResponse
{
    /**
     * @var YearMonthMinutesResponse[]
     *
     * @Type("array<Bitban\Transparent\Responses\Transcoder\YearMonthMinutesResponse>")
     */
    private $minutes;

    /**
     * @var int
     *
     * @Type("int")
     */
    private $minutes_plan;

    /**
     * @return YearMonthMinutesResponse[]
     */
    public function getMinutes(): array
    {
        return $this->minutes;
    }

    /**
     * @return YearMonthMinutesResponse[]
     */
    public function getYearMonthMinutesResponses(): array
    {
        return $this->getMinutes();
    }

    public function getMinutesPlan(): int
    {
        return $this->minutes_plan;
    }
}
