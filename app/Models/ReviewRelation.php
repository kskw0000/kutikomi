<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRelation  extends Model
{
    use HasFactory;

    protected $table = 'tbl_review_relation';

    protected $fillable = [
        'nursery_id',
        'user_id',
        'status',
    ];
}
