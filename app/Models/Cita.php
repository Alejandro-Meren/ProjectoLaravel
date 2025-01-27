<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'stylist_id', 'service_id', 'appointment_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stylist()
    {
        return $this->belongsTo(Stylist::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}