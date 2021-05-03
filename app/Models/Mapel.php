<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable =[
        'hari', 'mata_pelajaran', 'jam', 'nama_pengajar', 'kelas'
    ];
}
