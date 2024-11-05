<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Head Office' => ['Business Excellence', 'Commercial', 'Finance & Legal', 'Supply Chain'],
            'LV Factory' => ['Business Excellence',  'Commercial', 'Finance & Legal', 'Supply Chain', 'Operations'],
            'MV/HV Factory' => ['Business Excellence', 'Commercial', 'Operations']
        ];

        // Use the following instead for mysql
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //
        // for SQL: as in https://github.com/laravel/framework/issues/35401
        // DB::table('sectors')->delete();
        //
        // Use the following instead for sqlite
        DB::statement('PRAGMA foreign_keys = OFF;');
        DB::table('sectors')->truncate();

        foreach ($data as $location => $sectors) {
            $location_id = Location::where('name', $location)->get()->first()->id;
            foreach ($sectors as $sector) {
                Sector::create([
                    'location_id' => $location_id,
                    'name' => $sector,
                ]);
            }
        }

        // Use the following instead for mysql
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        //
        // Use the following instead for sqlite
        DB::statement('PRAGMA foreign_keys = ON;');

        // Sector::factory()->count(5)->create();
    }
}