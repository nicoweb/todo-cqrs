<?php

declare(strict_types=1);

namespace App\Command;

final readonly class CreateTaskCommand
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
    ) {
    }
}
