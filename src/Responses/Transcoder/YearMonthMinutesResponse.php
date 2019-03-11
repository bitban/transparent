<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Responses\Transcoder;

use JMS\Serializer\Annotation\Type;

class YearMonthMinutesResponse
{
    /**
     * @var float
     *
     * @Type("float")
     */
    private $duration;

    /**
     * @var int
     *
     * @Type("int")
     */
    private $year;

    /**
     * @var int
     *
     * @Type("int")
     */
    private $month;

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getMonth(): int
    {
        return $this->month;
    }
}
