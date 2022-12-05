<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'char';
    public $timestamps = false;
}
