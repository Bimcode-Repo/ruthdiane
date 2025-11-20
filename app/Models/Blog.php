<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'slug',
        'title_fr',
        'title_en',
        'title_es',
        'title_it',
        'content_fr',
        'content_en',
        'content_es',
        'content_it',
        'image',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Get the title in the current locale
     */
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"title_$locale"} ?? $this->title_fr;
    }

    /**
     * Get the content in the current locale
     */
    public function getContentAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"content_$locale"} ?? $this->content_fr;
    }

    /**
     * Get the excerpt (first 150 characters of content)
     */
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 150);
    }

    /**
     * Scope for published blogs only
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now())
                     ->orderBy('published_at', 'desc');
    }

    /**
     * Boot method to auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title_fr);
            }
        });
    }
}
