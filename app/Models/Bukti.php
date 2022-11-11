<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    public function pengaduan(){
        return $this->belongsTo(Pengaduan::class);
    }
    use HasFactory;
    protected $table ='bukti';
    protected $primaryKey = 'kode_bukti';
    protected $fillable = array('bukti','created_at', 'updated_at', 'kode_pengaduan');
}
