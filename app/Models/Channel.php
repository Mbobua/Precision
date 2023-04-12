<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_name',
    ];

    protected $guarded = [];

    public function Tickets():BelongsToMany
    {
        return $this->belongsToMany(Tickets::class);
    }

}
