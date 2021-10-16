<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suket extends Model
{
    use HasFactory;
    protected $table = "surat";
    protected $fillable = ['no_surat','perihal','kepada','keterangan','tanggal','waktu','tempat','id_manajemen'];
}
