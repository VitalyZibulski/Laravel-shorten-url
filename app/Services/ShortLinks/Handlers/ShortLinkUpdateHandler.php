<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\Link;
use App\Services\ShortLinks\Repositories\StatisticInformationRepositoryInterface;

class ShortLinkUpdateHandler
{
    private StatisticInformationRepositoryInterface $shortLinksRepository;

    public function __construct(StatisticInformationRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(Link $shortLink, array $data): Link
    {
        return $this->shortLinksRepository->update($shortLink, $data);
    }
}
