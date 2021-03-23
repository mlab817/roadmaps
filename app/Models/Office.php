<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Office extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = [
        'name',
        'short_name',
    ];

    public function commodities(): BelongsToMany
    {
        return $this->belongsToMany(Commodity::class);
    }

    public function latest_report(): HasOne
    {
        return $this->hasOne(ProgressReport::class)->latest('report_period_id');
    }

    public function progress_reports(): HasMany
    {
        return $this->hasMany(ProgressReport::class);
    }

    public function roadmaps(): HasMany
    {
        return $this->hasMany(Roadmap::class);
    }

    public function toSearchableArray(): array
    {
        $roadmaps = $this->roadmaps()->get()->map(function ($roadmap) {
            return $roadmap['commodity']['name'];
        });

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'short_name'    => $this->short_name,
            'roadmaps'      => implode(' ', $roadmaps->toArray()),
        ];
    }
}
