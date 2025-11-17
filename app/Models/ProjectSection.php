<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectSection extends Model
{
    protected $fillable = [
        'project_id',
        'order',
        'title_fr',
        'title_en',
        'title_es',
        'title_it',
        'description_fr',
        'description_en',
        'description_es',
        'description_it',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class, 'section_id')->orderBy('order');
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{'title_' . app()->getLocale()} ?? $this->title_fr,
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{'description_' . app()->getLocale()} ?? $this->description_fr,
        );
    }
}
