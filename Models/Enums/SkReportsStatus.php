<?php

namespace Modules\SkyTours\Models\Enums;

use App\Contracts\Enum;

class SkReportsStatus extends Enum
{
    public const PENDING = 0;
    public const APPROVED = 1;
    public const REJECTED = 2;

    public static array $labels = [
        self::PENDING => 'Pending',
        self::APPROVED => 'Approved',
        self::REJECTED => 'Rejected'
    ];
}
