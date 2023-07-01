<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'tbl_city_region';

    protected $fillable = [
        'name',
        'flag',
        'prefecture_id'        
    ];
<<<<<<< HEAD

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
=======
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
}
