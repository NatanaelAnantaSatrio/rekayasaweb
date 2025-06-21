<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = 'matkul';
    protected $primaryKey = 'id_matkul';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nama', 'sks'
    ];
}