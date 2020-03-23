<?php

namespace App\Repositories;

use App\AuditServidor;

class AuditServidorRepository
{
    public function getAuditServidor($fecha)
    {
        return \DB::select('exec auditserv ? ', array($fecha));
    }
}