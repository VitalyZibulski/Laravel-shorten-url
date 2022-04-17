<?php

namespace App\Services\ShortLinks\Handlers;

use App\Services\ShortLinks\Repositories\ShortLinksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ShortLinkGetAllHandler
{
    private ShortLinksRepositoryInterface $shortLinksRepository;

    public function __construct(ShortLinksRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(): Collection
    {
        return $this->shortLinksRepository->getAll();
    }
}
