<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Prefecture extends Model
{
    use HasFactory;

    protected $table = 'tbl_prefecture_region';

    protected $fillable = [
        'name',
        'prefecture_id'        
    ];

    public function city()
    {
        return $this->hasMany(City::class);
    }
}
