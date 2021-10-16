<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suun extends Model
{
    use HasFactory;
    protected $table = "suun";
    protected $fillable = ['no_surat','perihal','kepada','keterangan','tanggal','waktu','tempat','id_manajemen'];
}
