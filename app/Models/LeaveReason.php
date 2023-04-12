<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeaveReason extends Model
{
    use HasFactory;

    public $fillable = ['reason'];
    public $guarded = ['reason'];

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}
