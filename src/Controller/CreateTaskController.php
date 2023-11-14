<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\CreateTaskCommand;
use App\Handler\CreateTaskHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/tasks', name: 'create_task', methods: ['POST'], format: 'json')]
final readonly class CreateTaskController
{
    public function __construct(
        private CreateTaskHandler $handler,
    ) {
    }

    public function __invoke(#[MapRequestPayload] CreateTaskCommand $command): Response
    {
        $this->handler->handle($command);

        return new Response(status: Response::HTTP_CREATED);
    }
}
