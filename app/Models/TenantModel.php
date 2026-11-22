<?php

namespace App\Models;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class TenantModel extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    /**
     * Columns stored as real columns on the `tenants` table.
     * Anything not listed here is stored in the JSON `data` column.
     */
    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'email',
        ];
    }
}