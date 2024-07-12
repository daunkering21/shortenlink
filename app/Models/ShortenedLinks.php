<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenedLinks extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'shortened_links';
    
    public function shortenedLink()
    {
        return $this->belongsTo(User::class, 'username', 'username_id');
    }
}
