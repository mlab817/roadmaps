<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoadmapUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'roadmap_id',
        'progress_report_id',
        'participants_involved',
        'activities_done',
        'activities_ongoing',
        'overall_status',
        'report_date',
        'remarks',
        'attachment_path',
        'attachment_url',
    ];

    public function roadmap(): BelongsTo
    {
        return $this->belongsTo(Roadmap::class);
    }

    public function progress_report(): BelongsTo
    {
        return $this->belongsTo(ProgressReport::class);
    }

    public function roadmap_version(): BelongsTo
    {
        return $this->belongsTo(RoadmapVersion::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
