<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'ulang_tahun',
        'website',
        'no_hp',
        'umur',
        'email',
        'profil',
        'foto',
    ];
}
