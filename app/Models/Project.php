<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'slug',
        'title_fr',
        'title_en',
        'title_es',
        'title_it',
        'image',
        'order',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{'title_' . app()->getLocale()} ?? $this->title_fr,
        );
    }

    public function sections(): HasMany
    {
        return $this->hasMany(ProjectSection::class)->orderBy('order');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
