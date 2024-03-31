<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thesis extends Model
{

    protected $fillable = [
        'title',
        'abstract',
        'summary_of_findings',
        'conclusion',
        'recommendations',
        'start_schoolyear',
        'end_schoolyear',
        'adviser',
        'date_published'
    ];


    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'theses_authors', 'thesis_id', 'author_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'thesis_id', 'user_id');
    }
    use HasFactory;
}
