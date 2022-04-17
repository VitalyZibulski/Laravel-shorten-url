<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatisticInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_agent', 'user_ip', 'link_id'
    ];

    public function links(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
