<?php

namespace Modules\SkyTours\Models\Enums;

use App\Contracts\Enum;

class SkTourStatus extends Enum
{
    public const DRAFT = 0;
    public const CANCELLED = 1;
    public const PUBLISHED = 2;
    public const FINISHED = 3;

    public static array $labels = [
        self::DRAFT => 'Draft',
        self::PUBLISHED => 'Published',
        self::CANCELLED => 'Cancelled',
        self::FINISHED => 'Finished',
    ];
}
