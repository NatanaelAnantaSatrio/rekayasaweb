<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nama', 'fakultas', 'jurusan'
    ];
}