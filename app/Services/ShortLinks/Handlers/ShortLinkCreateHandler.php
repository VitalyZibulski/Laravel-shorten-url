<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\Link;
use App\Services\ShortLinks\Repositories\ShortLinksRepositoryInterface;
use Illuminate\Support\Str;

class ShortLinkCreateHandler
{
    private ShortLinksRepositoryInterface $shortLinksRepository;

    public function __construct(ShortLinksRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(array $data): Link
    {
        $data['short_code'] = Str::random(6);
        return $this->shortLinksRepository->create($data);
    }
}
