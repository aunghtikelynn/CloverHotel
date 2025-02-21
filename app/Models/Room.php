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
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'bed',
        'bath',
        'type_id',	
        'description',
        'price',
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

}
