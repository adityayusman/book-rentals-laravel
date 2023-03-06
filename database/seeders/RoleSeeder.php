<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Remove tabled or reset table
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        // Insert default data for roles tables
        $data = [
            'admin', 'client'
        ];

        foreach ($data as $value) {
            Role::insert([
                'name' => $value
            ]);
        }
    }
}
