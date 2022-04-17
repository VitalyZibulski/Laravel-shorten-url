<?php

namespace App\Services\ShortLinks\Handlers;

use App\Services\ShortLinks\Repositories\StatisticInformationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ShortLinkGetAllHandler
{
    private StatisticInformationRepositoryInterface $shortLinksRepository;

    public function __construct(StatisticInformationRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(): Collection
    {
        return $this->shortLinksRepository->getAll();
    }
}
