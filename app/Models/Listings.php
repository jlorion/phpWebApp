<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listings extends Model
{
    use HasFactory;

    protected $fillable =[

        'user_id',
        'title',
        'price',
        'location',
        'contacts',
        'longtitude',
        'latitude',
        'Description',
        'images',
    ];

    public function scopeFilter($query,  array $filter){
        if ($filter['search'] ?? false) {
            $query->where('location', 'like', '%'.request('search').'%')->orWhere('title', 'like', '%'.request('search').'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
