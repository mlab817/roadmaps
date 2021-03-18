<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class ProgressReport extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = [
        'office_id',
        'report_period_id',
        'attachment_path',
        'attachment_url',
        'remarks',
    ];

    protected $casts = [
        'report_date' => 'datetime:Y-m-d'
    ];

    protected $appends = [
        'title',
    ];

    public function commodities(): BelongsToMany
    {
        return $this->belongsToMany(Commodity::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function report_period(): BelongsTo
    {
        return $this->belongsTo(ReportPeriod::class);
    }

    public function roadmap_updates(): HasMany
    {
        return $this->hasMany(RoadmapUpdate::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute(): string
    {
        return ($this->office && $this->report_period)
            ? $this->office->short_name . ' as of ' . $this->report_period->name
            : '';
    }

    public function toSearchableArray()
    {
        return [
            'id'            => $this->id,
            'report_period' => $this->report_period->name ?? '',
            'office'        => $this->office->name ?? '',
            'title'         => $this->title,
        ];
    }
}
