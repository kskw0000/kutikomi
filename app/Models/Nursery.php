<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prefecture;
use App\Models\City;
use App\Models\Company;
use App\Models\Facility;

class Nursery extends Model
{
    use HasFactory;

    protected $table = 'tbl_nursery';

    protected $fillable = [
        'name',
        'address',
        'city_id',
        'cooperate_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company() {
        return $this->belongsTo(Company::class, 'cooperate_id');
    }

    public function facility() {
        return $this->belongsToMany(Facility::class, 'tbl_nursery_facility');
    }
}
