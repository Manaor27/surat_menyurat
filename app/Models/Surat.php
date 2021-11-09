<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = "surat";
    protected $fillable = ['perihal','kepada','keterangan','tanggal','waktu','tempat','kode','nama','penyelenggara','target','tamu','id_user','id_jenis'];

    public function jenis() {
        return $this->belongsTo(JenisSurat::class, 'id_jenis');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function informasi() {
        return $this->hasMany(Informasi::class,'id_surat');
    }
}
