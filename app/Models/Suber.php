<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suber extends Model
{
    use HasFactory;
    protected $table = "surat";
    protected $fillable = ['no_surat','perihal','tanggal','target','tamu','tempat','id_manajemen'];
}
