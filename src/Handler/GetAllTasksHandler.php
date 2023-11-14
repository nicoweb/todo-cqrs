<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Task;
use App\Query\GetAllTasksQuery;
use Doctrine\ORM\EntityManagerInterface;

final readonly class GetAllTasksHandler
{
    public function __construct(private EntityManagerInterface $entityManager) {}

    public function handle(GetAllTasksQuery $query): array
    {
        return $this->entityManager->getRepository(Task::class)->findAll();
    }
}
