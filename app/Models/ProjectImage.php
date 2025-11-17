<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    protected $fillable = [
        'section_id',
        'image',
        'order',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(ProjectSection::class, 'section_id');
    }
}
