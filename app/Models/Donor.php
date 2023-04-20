<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Donor extends Authenticatable
{
    use HasFactory;

    protected $guard = 'donor';

    protected $dates = ['birth_date', 'last_donate'];

    protected $casts = [
        'socialMedia' => 'object'
    ];


    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id')->withDefault();
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function bloodRequest(){
        return $this->hasMany(RequestBlood::class);
    }

}
