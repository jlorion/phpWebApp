<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listings extends Model
{
    use HasFactory;

    protected $fillable =[

        'title',
        'price',
        'contacts',
        'longtitude',
        'latitude',
        'description',
        'images',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
