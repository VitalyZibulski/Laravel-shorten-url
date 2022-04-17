<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\Link;
use App\Services\ShortLinks\Repositories\StatisticInformationRepositoryInterface;

class ShortLinkFindHandler
{
    private StatisticInformationRepositoryInterface $shortLinksRepository;

    public function __construct(StatisticInformationRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(string $shortCode): ?Link
    {
        return $this->shortLinksRepository->find($shortCode);
    }
}
