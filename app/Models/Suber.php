<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suber extends Model
{
    use HasFactory;
    protected $table = "suber";
    protected $fillable = ['no_surat','tema','tanggal','target','pembicara','tempat','id_user'];
}
