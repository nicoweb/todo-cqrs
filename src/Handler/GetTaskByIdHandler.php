<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Task;
use App\Query\GetTaskByIdQuery;
use Doctrine\ORM\EntityManagerInterface;

final readonly class GetTaskByIdHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function handle(GetTaskByIdQuery $query): Task
    {
        $task = $this->entityManager->getRepository(Task::class)->find($query->id);

        if ($task === null) {
            throw new \Exception('Task not found');
        }

        return $task;
    }
}
