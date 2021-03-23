<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Focal extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = [
        'focal_type_id',
        'roadmap_id',
        'office_id',
        'name',
        'designation',
        'email',
        'telephone_number',
        'fax_number',
        'mobile_number',
        'viber_number',
    ];

    public function focal_type(): BelongsTo
    {
        return $this->belongsTo(FocalType::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function roadmaps(): BelongsToMany
    {
        return $this->belongsToMany(Roadmap::class);
    }

    protected function makeAllSearchableUsing($query)
    {
        return $query->with('focal_type','office','roadmaps');
    }

    public function toSearchableArray(): array
    {
        $roadmaps = $this->roadmaps()->get()->map(function ($roadmap) {
            return $roadmap['commodity']['name'];
        });
        return [
            'id'                => $this->id,
            'focal_type'        => $this->focal_type['name'],
            'name'              => $this->name,
            'designation'       => $this->designation,
            'email'             => $this->email,
            'office_id'         => $this->office['name'],
            'telephone_number'  => $this->telephone_number,
            'fax_number'        => $this->fax_number,
            'mobile_number'     => $this->mobile_number,
            'viber_number'      => $this->viber_number,
            'roadmaps'          => implode(' ', $roadmaps->toArray()),
        ];
    }
}
