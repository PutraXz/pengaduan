<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan; 
use Carbon\Carbon;
use App\Models\Bukti;
use Illuminate\Support\Facades\Validator;


class PengaduanController extends Controller
{
    public function index(){
        $users = User::with(['pengaduan'])->find(Auth::id());
        return view('masyarakat.pengaduan', compact('users'));
    }
    public function create(){ 
        return view('masyarakat.add_pengaduan');
    }
    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:20480',
        ]);
        if ($validator->fails()) {
            return redirect('home/add/pengaduan')
            ->withErrors($validator)
            ->withInput();
        }else{
                $file = $request->file('file');
                $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
                $file->move(public_path('bukti/'), $filename);
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
                return redirect('admin/pengaduan');
        }

    }
    public function edit($kode){
        $pengaduan = Pengaduan::where('Kode', $kode)->first();
        return view('masyarakat.edit_pengaduan')->with('pengaduan', $pengaduan);
    }
    public function update(Request $request, $kode){
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
