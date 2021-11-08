<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $table = "informasi";
    protected $fillable = ['no_surat','status','tanggal','id_surat','id_pejabat'];

    public function pejabat() {
        return $this->belongsTo(Pejabat::class,'id_pejabat');
    }

    public function surat() {
        return $this->belongsTo(Surat::class,'id_surat');
    }
}
