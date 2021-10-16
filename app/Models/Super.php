<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Super extends Model
{
    use HasFactory;
    protected $table = "surat";
    protected $fillable = ['no_surat','perihal','keterangan','id_manajemen'];
}
