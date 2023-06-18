<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'idstudent';
    protected $fillable = [
        'idstudent',
        'fullname',
        'gender',
        'email',
        'phone'
    ];

    public $incrementing = false;
    public $timestamps = true;
}
