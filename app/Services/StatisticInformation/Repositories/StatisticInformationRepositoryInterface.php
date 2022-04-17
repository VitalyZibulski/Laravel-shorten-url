<?php

namespace App\Services\StatisticInformation\Repositories;

use App\Models\Link;
use App\Models\StatisticInformation;
use Illuminate\Database\Eloquent\Collection;

interface StatisticInformationRepositoryInterface
{
    public function getAll(): Collection;

    public function create(array $data): StatisticInformation;
}
