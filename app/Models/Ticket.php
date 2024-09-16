<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
