<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Stylist;
use App\Models\Service;
use App\Models\Cita;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        Stylist::factory(5)->create();
        Service::factory(10)->create();
        Cita::factory(20)->create();
    }
}