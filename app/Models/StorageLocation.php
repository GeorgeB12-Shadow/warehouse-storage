<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StorageLocation extends Model
{
    protected $fillable = [
        'project_id',
        'warehouse',
        'zone',
        'rack',
        'location_code',
        'capacity',
        'occupied',
        'unit',
        'status',
        'notes',
    ];

    protected $casts = [
        'capacity' => 'decimal:2',
        'occupied' => 'decimal:2',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
