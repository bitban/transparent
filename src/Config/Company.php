<?php
/**
 * Copyright 2017 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Config;

class Company
{
    /** @var int */
    private $companyId;

    public function __construct(int $companyId)
    {
        $this->companyId = $companyId;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }
}
