<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Karyawan extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['username', 'password'];
}
