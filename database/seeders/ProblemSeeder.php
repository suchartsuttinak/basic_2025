<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Problem;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Problem::insert([
        ['name' => 'เร่ร่อน'],
        ['name' => 'ถูกทอดทิ้ง'],
        ['name' => 'ถูกเลี้ยงดูไม่เหมาะสม'],
        ['name' => 'ถูกทารุณกรรม'],
        ['name' => 'ถูกกระทำความรุนแรงในครอบครัว'],
        ['name' => 'ถูกแสวงหาประโยชน์'],
        ['name' => 'เหยื่อค้ามนุษย์'],
    ]);


    }
}
