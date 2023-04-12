<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Incidents extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_name',
    ];
    protected $guarded = [];

    public function assets():BelongsToMany
    {
        return $this->belongsToMany(Asset::class);
    }
}
