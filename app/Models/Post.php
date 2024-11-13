<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'summary', 'slug', 'status', 'reading_time', 'publish_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
