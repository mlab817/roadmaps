<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Roadmap extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = [
        'office_id',
        'commodity_id',
        'start_date',
        'pcaf_consultation_date',
    ];

    public function commodity(): BelongsTo
    {
        return $this->belongsTo(Commodity::class);
    }

    public function compliance_reviews(): HasManyThrough
    {
        return $this->hasManyThrough(ComplianceReview::class, RoadmapVersion::class);
    }

    public function focals(): BelongsToMany
    {
        return $this->belongsToMany(Focal::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function progress_report(): BelongsTo
    {
        return $this->belongsTo(ProgressReport::class);
    }

    public function roadmap_updates(): HasMany
    {
        return $this->hasMany(RoadmapUpdate::class);
    }

    public function latest_update(): HasOne
    {
        return $this->hasOne(RoadmapUpdate::class)->latest();
    }

    public function roadmap_versions(): HasMany
    {
        return $this->hasMany(RoadmapVersion::class);
    }

    public function upload(): BelongsTo
    {
        return $this->belongsTo(Upload::class);
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'id'            => $this->id,
            'office'        => $this->office['name'] ?? '',
            'commodity'     => $this->commodity['name'] ?? '',
            'start_date'    => $this->start_date,
        ];
    }
}
