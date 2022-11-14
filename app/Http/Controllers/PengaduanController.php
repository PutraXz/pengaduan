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
        $this->validate($request, [
			'file' => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx,jpg,jpeg,png|max:20480',
		]);
        if ($request->hasFile('file')){
            $file = $request->file('file');
            
                $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
                $tujuan_bukti = 'bukti';
                $sending = $file->move(public_path('bukti/'), $filename);
                $randomNumber = random_int(100000, 999999);
                // add pengaduan
                $pengaduan = new Pengaduan();
                $pengaduan->kode = $randomNumber;
                $pengaduan->isi = $request->isi;
                $pengaduan->tanggal = Carbon::now();
                $pengaduan->judul = $request->judul;
                $pengaduan->user_id = Auth::user()->id;
                $pengaduan->save();
                // add bukti
                $bukti = new Bukti();
                $bukti->kode_bukti = $randomNumber;
                $bukti->bukti = $filename;
                $bukti->kode_pengaduan = $pengaduan->kode;
                $bukti->save();
                return redirect('home/pengaduan');
            } else{
                
                $message = "Cek file ";
                echo 'gagal';
                echo "<script type='text/javascript'>alert('$message');</script>";
            
        }

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
