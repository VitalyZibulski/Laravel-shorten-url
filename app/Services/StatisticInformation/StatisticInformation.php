<?php

namespace App\Services\StatisticInformation;

use App\Models\Link;
use Illuminate\Http\Request;

class StatisticInformation
{
    public function getStatistic(Request $request, Link $link): array
    {
        $statisticInformation = [];

        $statisticInformation["user_agent"] = $request->server("HTTP_USER_AGENT") ?? "agent is not defined";
        $statisticInformation["user_ip"] = $request->server("REMOTE_ADDR") ?? "ip is not defined";
        $statisticInformation["link_id"] = $link->id;

        return $statisticInformation;
    }
}
