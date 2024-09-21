<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
