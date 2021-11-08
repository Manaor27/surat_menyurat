<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;
    protected $table = "jenis";
    protected $fillable = ['jenis_surat'];

    public function surat() {
        return $this->hasOne(Surat::class, 'id_surat');
    }
}
