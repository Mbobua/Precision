<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = ['priority_name'];
    protected $guarded = [];

    public function Nabotickets(): HasMany
    {
        return $this->hasMany(Priority::class);
    }
}
