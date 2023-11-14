<?php

declare(strict_types=1);

namespace App\Enum;

enum TaskStatus: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
