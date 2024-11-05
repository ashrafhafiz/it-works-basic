<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Location extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'postal_code',
        'country',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function sectors(): HasMany
    {
        return $this->hasMany(Sector::class);
    }

    public function departments(): HasManyThrough
    {
        return $this->hasManyThrough(Department::class, Sector::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
