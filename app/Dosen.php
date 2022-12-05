<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
