<?php

declare(strict_types=1);

namespace App\Handler;

use App\Command\CreateTaskCommand;
use App\Entity\Task;
use App\Enum\TaskStatus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;

final class CreateTaskHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function handle(CreateTaskCommand $command): void
    {
        $task = new Task();
        $task->setId(Uuid::fromString($command->id));
        $task->setTitle($command->title);
        $task->setDescription($command->description);
        $task->setStatus(TaskStatus::IN_PROGRESS);
        $task->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($task);
        $this->entityManager->flush();
    }
}
