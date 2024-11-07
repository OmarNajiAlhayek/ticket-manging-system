<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ($this->statusesTableIsEmpty()) {

            DB::table('statuses')->insert([
                ['name' => 'pending', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'ongoing', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'testing', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'finished', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }

    private function statusesTableIsEmpty(): bool
    {
        return DB::table('statuses')->count() === 0;
    }
}
