<?php

declare(strict_types=1);

namespace App\Handler;

use App\Command\UpdateTaskCommand;
use App\Entity\Task;
use App\Enum\TaskStatus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;

final readonly class UpdateTaskHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function handle(UpdateTaskCommand $command): void
    {
        $task = $this->entityManager->getRepository(Task::class)->find(Uuid::fromString($command->id));

        if (!$task) {
            throw new \InvalidArgumentException('Task not found.');
        }

        if (null !== $command->title) {
            $task->setTitle($command->title);
        }

        if (null !== $command->description) {
            $task->setDescription($command->description);
        }

        if (null !== $command->status) {
            $taskStatus = TaskStatus::from($command->status);
            $task->setStatus($taskStatus);
        }

        $task->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->flush();
    }
}
