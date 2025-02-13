<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];
    
   

    public function profileImage()
    {
        # code...
        $imagePath = ($this->image) ? $this->image : '/profile/https://bit.ly/2RYJXYg';
        
        return '/storage/'. $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
