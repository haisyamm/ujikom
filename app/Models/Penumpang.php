<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;
    protected $table = "penumpang";

    protected $fillable = [
        'nama_penumpang',
        'alamat',
        'jenis_kelamin',
        'telepon',
        'tanggal_lahir',
        'username',
        'password',
    ];
}
