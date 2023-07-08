<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
use App\Models\Nursery;

=======
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
class Facility extends Model
{
    use HasFactory;

    protected $table = 'tbl_facility';

    protected $fillable = [
        'name'
    ];
<<<<<<< HEAD

    public function nursery() {
        return $this->belongsToMany(Nursery::class, 'tbl_nursery_facility');
    }
=======
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
}
