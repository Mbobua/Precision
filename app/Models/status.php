<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $guarded = [];

    public function tickets(): HasMany
    {
        return $this->hasMany(Tickets::class);
    }
    public function Nabotickets():BelongsToMany
    {
        return $this->belongsToMany(NaboTickets::class);
    }
}
