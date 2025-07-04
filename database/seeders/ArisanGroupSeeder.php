<?php

namespace Database\Seeders;

use App\Models\ArisanGroup;
use Illuminate\Database\Seeder;

class ArisanGroupSeeder extends Seeder
{
    public function run(): void
    {
        ArisanGroup::create([
            'name' => 'Arisan Mahasiswa',
            'total_rounds' => 6,
            'monthly_fee' => 100000,
            'status' => 'open',
        ]);

        ArisanGroup::create([
            'name' => 'Arisan Kantor',
            'total_rounds' => 12,
            'monthly_fee' => 200000,
            'status' => 'open',
        ]);
    }
}
