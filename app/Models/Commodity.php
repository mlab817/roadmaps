<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Commodity extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = [
        'name',
        'office_id'
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function roadmaps(): HasMany
    {
        return $this->hasMany(Roadmap::class);
    }

    public function makeAllSearchableUsing($query)
    {
        return $query->with('office');
    }

    public function toSearchableArray(): array
    {
        $roadmaps = $this->roadmaps()->get()->map(function ($roadmap) {
            return $roadmap['commodity']['name'];
        });

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'office_name'   => ($this->office) ? $this->office['name'] : '',
            'roadmaps'      => implode(' ', $roadmaps->toArray()),
        ];
    }
}
