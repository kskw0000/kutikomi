<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use App\Models\Prefecture;
use App\Models\City;
use App\Models\Company;
use App\Models\Facility;
=======
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc

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
<<<<<<< HEAD

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
=======
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
}
