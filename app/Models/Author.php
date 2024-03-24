<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name'
    ];
    public function theses(): BelongsToMany
    {
        return $this->belongsToMany(Thesis::class, 'theses_authors', 'author_id', 'thesis_id');
    }
}
