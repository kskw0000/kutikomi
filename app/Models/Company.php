<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prefecture;
use App\Models\City;

class Company extends Model
{
    use HasFactory;

    protected $table = 'tbl_cooperate';

    protected $fillable = [
        'name',
        'address',
        'postcode',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
