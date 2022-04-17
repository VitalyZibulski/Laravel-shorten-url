<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\Link;
use App\Services\ShortLinks\Repositories\StatisticInformationRepositoryInterface;

class ShortLinkDeleteHandler
{
    private StatisticInformationRepositoryInterface $shortLinksRepository;

    public function __construct(StatisticInformationRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(Link $shortLink): ?bool
    {
        return $this->shortLinksRepository->delete($shortLink);
    }
}
