<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use Carbon\Carbon;
use App\Models\Bukti;
class PengaduanController extends Controller
{
    public function index(){

        $users = User::with(['pengaduan'])->find(Auth::id());
        return view('masyarakat.pengaduan', compact('users'));
    }
    public function createPengaduan(){
        return view('masyarakat.add_pengaduan');
    }
    public function addPengaduan(Request $request){
        $randomNumber = random_int(100000, 999999);
        $pengaduan = new Pengaduan();
        $pengaduan->kode = $randomNumber;
        $pengaduan->isi = $request->isi;
        $pengaduan->tanggal = Carbon::now();
        $pengaduan->judul = $request->judul;
        $pengaduan->user_id = Auth::user()->id;
        $pengaduan->save();

        $bukti = new Bukti();
        $bukti->kode_bukti = 1;
        $bukti->bukti = 'test';
        $bukti->kode_pengaduan = $pengaduan->kode;
        $bukti->save();
        return redirect('home/pengaduan');
    }
    public function editPengaduan($kode){
        $pengaduan = Pengaduan::where('Kode', $kode)->first();
        return view('masyarakat.edit_pengaduan')->with('pengaduan', $pengaduan);
    }
    public function updatePengaduan(Request $request, $kode){
        $user = Pengaduan::find($kode);
        $user->isi = $request->isi;
        $user->judul = $request->judul;
        $user->save();
        return redirect('/home/pengaduan');
    }
    public function destroy($kode){
        $pengaduan = Pengaduan::find($kode);
        $pengaduan->delete();
        return redirect('/home/pengaduan');
    }
}
