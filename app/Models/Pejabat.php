<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;
    protected $table = "tanda_tangan";
    protected $fillable = ['nidn','nama','jabatan'];

    public function informasi() {
        return $this->hasOne(Informasi::class,'id_pejabat');
    }
}
