<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'lead_id');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }

}
