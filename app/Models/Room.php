<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rooms';
    protected $fillable = [
        'name',
        'image',
        'image-1',
        'image-2',
        'image-3',
        'image-4',
        'type_id',	
        'description',
        'price',
    ];
}
