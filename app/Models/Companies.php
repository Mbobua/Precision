<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
    ];
    protected $guarded = ['company_id'];

    public function users():HasMany
    {
        return $this->hasMany(User::class, 'company_id');
    }

    public function departments():HasMany
    {
        return $this->hasMany(Department::class,'company_id');
    }
}
