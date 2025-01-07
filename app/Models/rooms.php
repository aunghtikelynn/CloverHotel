<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class rooms extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rooms';
    protected $fillable = [
        'name',
        'image',
        'description',
        'service',
        'price',
    ];
}
