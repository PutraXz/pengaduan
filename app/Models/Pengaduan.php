<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pengaduan(){
        return $this->hasMany(Bukti::class);

    }
    use HasFactory;
    public $incrementing = false;
    protected $table ='pengaduan';
    protected $primaryKey = 'kode';
    protected $fillable = array('isi','tanggal', 'judul', 'users_id');
}
