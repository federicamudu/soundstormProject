<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=[
        'avatar', 
        'address',
        'city',
        'province',
        'region',
        'country',
        'zip_code',
        'mobile_number'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
