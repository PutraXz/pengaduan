<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bukti;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Whoops\Run;
use Carbon\Carbon;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Validator;
class PengaduanController extends Controller
{
    public function index(){
        $users = User::with(['pengaduan'])->whereNotIn('level', ['admin', 'pimpinan'])->get();
        return view('admin.pengaduan', compact('users'));
    }
    public function create(){
        $users = User::whereNotIn('level', ['admin', 'pimpinan'])->get();
        return view('admin.add_pengaduan', compact('users'));
    }
    public function add(Request $request){
        
        $validator = Validator::make($request->all(), [
            'file' => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:20480',
        ]);
        if ($validator->fails()) {
            echo 'gagal';
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
                $pengaduan->user_id = $request->user;
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
        $user = User::where('id', $pengaduan->user_id)->first();
        return view('admin.edit_pengaduan', compact('user', 'pengaduan'));
    }
    public function update(Request $request, $kode){
        $user = Pengaduan::find($kode);
        $user->isi = $request->isi;
        $user->judul = $request->judul;
        $user->save();
        return redirect('/admin/pengaduan');
    }
    public function destroy($kode){
        $pengaduan = Pengaduan::find($kode);
        $bukti = Bukti::with(['pengaduan'])->where('kode_pengaduan', $pengaduan->kode)->first();
        $file_path = public_path('bukti/'.$bukti->bukti);
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        $pengaduan->delete();
        return redirect('/admin/pengaduan');
    }
    public function status(Request $request, $kode){
        switch ($request->input('action')){
            case 'konfirmasi':
                $pengaduan = Pengaduan::find($kode);
                $pengaduan->status = 'Di Konfirmasi';
                $pengaduan->save();
                return redirect('admin/pengaduan');
                break;
            case 'ditolak':
                $pengaduan = Pengaduan::find($kode);
                $pengaduan->status = 'Di Tolak';
                $pengaduan->save();
                return redirect('admin/pengaduan');
                break;
        }
    }
}
