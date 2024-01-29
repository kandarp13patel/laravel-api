<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     protected $casts = [
        'featured' => 'boolean'
    ];

    protected $appends = [
       // 'date'
    ];

    protected $fillable = [
        'title',
        'description',
        'img',
         'date',
        'featured',
        
    ];

    // public function getDateAttribute(){
    //     return $this->createdated_at->format('Y-m-d');
    // }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
