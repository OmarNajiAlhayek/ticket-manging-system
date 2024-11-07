<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 5175a82efa4cfc71a48f8fe096d302b5c18f99f3
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'status',
    ];
//TODO: static analysis

// array<string, array<string, string>>

    public static function statuses(): array
    {
        return [
            'pending' => [
                'next' => 'ongoing',
                'previous' => 'finished',
            ],

            'ongoing' => [
                'next' => 'testing',
                'previous' => 'pending',
            ],
            'testing' => [
                'next' => 'finished',
                'previous' => 'ongoing',
            ],

            'finished' => [
                'next' => 'pending',
                'previous' => 'testing',
            ],
        ];
    }

<<<<<<< HEAD
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assigned_users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function files()
    {
        return $this->hasMany(TicketFile::class);
    }
=======
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
>>>>>>> 5175a82efa4cfc71a48f8fe096d302b5c18f99f3
}
