<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Super extends Model
{
    use HasFactory;
    protected $table = "super";
    protected $fillable = ['no_surat','perihal','isi','id_user'];
}
