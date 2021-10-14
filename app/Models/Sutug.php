<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sutug extends Model
{
    use HasFactory;
    protected $table = "sutug";
    protected $fillable = ['no_surat','kode','nama','tema','penyelenggara','tempat','id_user'];
}
