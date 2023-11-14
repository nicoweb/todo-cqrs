<?php

declare(strict_types=1);

namespace App\Http;

use App\Enum\TaskStatus;
use Symfony\Component\Validator\Constraints as Assert;

final readonly class UpdateTaskRequest
{
    public function __construct(
        public ?string $title,
        public ?string $description,
        #[Assert\Choice(callback: [TaskStatus::class, 'values'])]
        public ?string $status
    ) {
    }
}
