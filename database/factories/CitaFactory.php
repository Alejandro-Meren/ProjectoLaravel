<?php
namespace Database\Factories;

use App\Models\Cita;
use App\Models\User;
use App\Models\Stylist;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    protected $model = Cita::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'stylist_id' => Stylist::factory(),
            'service_id' => Service::factory(),
            'appointment_time' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}