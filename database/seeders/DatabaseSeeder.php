<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Method;
use App\Models\Saving;
use App\Models\Payment;
use App\Models\Student;
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
        User::factory(20)->create();
        Student::factory(60)->create();
        Saving::factory(30)->create();

        // Seeder Method Nabung
        Method::create([
            'name' => 'Manual',
        ]);

        Method::create([
            'name' => 'Transfer',
        ]);

        Payment::create([
            'name' => 'Gopay',
            'a_n' => 'Ahmad Fadli Tambunan',
            'account_no' => '081316616546',
        ]);

        Payment::create([
            'name' => 'BNI',
            'a_n' => 'Bang Tito',
            'account_no' => '1713561564',
        ]);

        Payment::create([
            'name' => 'BRI',
            'a_n' => 'Bang Gihon',
            'account_no' => '844648464',
        ]);

        Category::create([
            'name' => 'Kursus',
        ]);

        Category::create([
            'name' => 'Workshop',
        ]);

        Category::create([
            'name' => 'Sosial',
        ]);

        Category::create([
            'name' => 'Lomba'
        ]);

        Category::create([
            'name' => 'Beasiswa'
        ]);

        Classroom::create([
           'name' => 'Kelas 1'
        ]);
        Classroom::create([
           'name' => 'Kelas 2'
        ]);
        Classroom::create([
           'name' => 'Kelas 3'
        ]);
        Classroom::create([
           'name' => 'Kelas 4'
        ]);
        Classroom::create([
           'name' => 'Kelas 5'
        ]);
        Classroom::create([
           'name' => 'Kelas 6'
        ]);


    }
}
