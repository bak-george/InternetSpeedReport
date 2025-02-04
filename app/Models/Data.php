<?php

namespace App\Models;

use App\Http\Filters\V1\DataFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'download',
        'upload',
        'ping',
        'server_url',
        'server_lat',
        'server_lon',
        'server_name',
        'server_country',
        'server_id',
        'server_latency',
        'timestamp',
        'bytes_sent',
        'bytes_received',
        'client_ip',
        'client_lat',
        'client_lon',
        'client_isp',
        'client_country',
    ];

    protected $casts = [
        'download' => 'float',
        'upload' => 'float',
        'ping' => 'float',
        'server_id' => 'integer',
        'server_latency' => 'float',
        'bytes_sent' => 'integer',
        'bytes_received' => 'integer',
        'timestamp' => 'datetime',
    ];

    public function scopeFilter(Builder $builder, DataFilter $filters)
    {
        return $filters->apply($builder);
    }
}
