<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'user_type',
        'phone_number',
    ];

    protected $guarded = [
        'phone_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    protected $casts = [
            'email_verified_at' => 'datetime',
    ];


    protected $appends = [
        'profile_photo_url',
    ];

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Companies::class);
    }

    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function tickets():BelongsToMany
    {
        return $this->belongsToMany(Tickets::class);
    }
    public function Nabotickets():BelongsToMany
    {
        return $this->belongsToMany(NaboTickets::class);
    }

    ///////////////////////////////////////////////

    public function requested(): HasMany
    {
        return $this->hasMany(Tickets::class, 'requester_id');
    }

    public function solved(): HasMany
    {
        return $this->hasMany(Tickets::class, 'solver_id');
    }

    public function delegated():HasMany
    {
        return $this->hasMany(Tickets::class, 'delegatee_id');
    }
    public function naborequested(): HasMany
    {
        return $this->hasMany(NaboTickets::class, 'requester_id');
    }

    public function nabosolved(): HasMany
    {
        return $this->hasMany(NaboTickets::class, 'solver_id');
    }

    public function reason():BelongsTo
    {
        return $this->belongsTo(LeaveReason::class);
    }


}
