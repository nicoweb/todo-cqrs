<?php

declare(strict_types=1);

namespace App\Query;

final readonly class GetTaskByIdQuery
{
    public function __construct(
        public string $id,
    ) {
    }
}
