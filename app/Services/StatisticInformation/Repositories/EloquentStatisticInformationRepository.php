<?php

namespace App\Services\StatisticInformation\Repositories;

use App\Models\Link;
use App\Services\ShortLinks\Repositories\StatisticInformationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentStatisticInformationRepository implements StatisticInformationRepositoryInterface
{
    public function getAll(): Collection
    {
        return Link::latest()->get();
    }

    public function create(array $data): Link
    {
        return Link::create($data);
    }
}
