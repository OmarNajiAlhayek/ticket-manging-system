<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
>>>>>>> 5175a82efa4cfc71a48f8fe096d302b5c18f99f3

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

<<<<<<< HEAD
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function tickets_assigned_to_user(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class);
    }

=======
    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class);
    }
>>>>>>> 5175a82efa4cfc71a48f8fe096d302b5c18f99f3
}
