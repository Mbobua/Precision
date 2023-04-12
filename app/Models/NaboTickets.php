<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NaboTickets extends Model
{
    use HasFactory;

    protected $guarded = ['status_id', 'requester_id','priority_id', 'attachment'];

    public function status(): BelongsTo
    {
        return $this->belongsTo(status::class);
    }

    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function solver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function priority():BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function timestamps():HasMany
    {
        return $this->hasMany(Timestamp::class);
    }


}
