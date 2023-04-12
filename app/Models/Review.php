<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $table = "reviews";

    protected $fillable = [
        'rating',
        'comment'
    ];

    public function ticket():BelongsTo
    {
        return $this->belongsTo(Tickets::class);
    }




}
