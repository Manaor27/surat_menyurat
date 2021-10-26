<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $table = "informasi";
    protected $fillable = ['status','tanggal','id_surat','id_pejabat'];

    public function pejabat() {
        return $this->belongsTo('App\Models\Pejabat','id_pejabat')->withDefault();
    }
}
