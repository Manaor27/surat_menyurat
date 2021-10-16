<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenSurat extends Model
{
    use HasFactory;
    protected $table = "manajemen_surat";
    protected $fillable = ['id_user','id_jenis'];
}
