<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class usermanagementsystem extends Model
{
    use HasFactory;
    protected $table = 'usermanagementsystems';
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'salary_ctc',
        'department',
    ];
}
