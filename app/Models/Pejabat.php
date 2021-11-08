<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;
    protected $table = "pejabat";
    protected $fillable = ['nidn','nama','jabatan','ttd'];

    public function informasi() {
        return $this->hasOne(Informasi::class,'id_pejabat');
    }
}
