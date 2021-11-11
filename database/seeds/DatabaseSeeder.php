<?php

use App\student;
use App\bahanbaku;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Student::factory(10)->create();
        // $this->seed(Student::class);
        student::create([
            'nik' => 'RAW-01001-001',
            'name' => 'Albert Wesker',
            'address' => 'Jl. mangku bumi raya no 51'
        ]);
        student::create([
            'nik' => 'RAW-01001-002',
            'name' => 'Ronald Reagan',
            'address' => 'Jl. mangku galaxy raya no 51'
        ]);
        student::create([
            'nik' => 'RAW-01001-003',
            'name' => 'Donald Franklin',
            'address' => 'Jl. mangku galaxy raya no 52'
        ]);
        student::create([
            'nik' => 'RAW-01001-004',
            'name' => 'Bruce Wayne',
            'address' =>  'Jl. michigan galaxy raya no 52'
        ]);
        bahanbaku::create([
            'part_number' => 'RAW-01001-001',
            'name' => 'Screw',
            'um' => 'EA'
        ]);
        bahanbaku::create([
            'part_number' => 'RAW-01001-002',
            'name' => 'English Key',
            'um' => 'AE'
        ]);
        bahanbaku::create([
            'part_number' => 'RAW-01001-003',
            'name' => 'Hammer',
            'um' => 'DAK'
        ]);
    }
}
