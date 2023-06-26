<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Nursery;

class Facility extends Model
{
    use HasFactory;

    protected $table = 'tbl_facility';

    protected $fillable = [
        'name'
    ];

    public function nursery() {
        return $this->belongsToMany(Nursery::class, 'tbl_nursery_facility');
    }
}
