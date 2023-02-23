<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

$specialties=[
    'Oftamologia',
    'Pedriatria',
    'Neurologia'

];

foreach ($specialties as $specialty){
    Specialty::create([
        'name'=>$specialty,
    ]);


}
    }
}
