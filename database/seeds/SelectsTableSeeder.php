<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Gt;
use App\Models\Khoa;
use App\Models\Vien;


class SelectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


        Gt::create(['name' => 'Nam']);
        Gt::create(['name' => 'Nữ']);
        Khoa::create(['name' => '60']);
        Khoa::create(['name' => '61']);
        Khoa::create(['name' => '62']);
        Khoa::create(['name' => '63']);
        Khoa::create(['name' => '64']);
        Vien::create(['name' => 'Công nghệ thông tin']);
        Vien::create(['name' => 'Ngoại ngữ']);
        Vien::create(['name' => 'Cơ khí']);
        Vien::create(['name' => 'Điện']);
        Vien::create(['name' => 'Vật lý kĩ thuật']);

    }
}
