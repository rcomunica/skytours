<?php

namespace Modules\SkyTours\Models\Enums;

use App\Contracts\Enum;

class SkReportsStatus extends Enum
{
    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const REJECTED = 'rejected';

    public static array $labels = [
        self::PENDING => 'Pending',
        self::APPROVED => 'Approved',
        self::REJECTED => 'Rejected'
    ];
}
