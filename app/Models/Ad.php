<?php

namespace App\Models;

use App\Http\Controllers\AdController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function leads()
    {
        return $this->hasMany(Lead::class, 'ad_id');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }

}
