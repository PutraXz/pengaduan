<?php

namespace App\Http\Controllers\Pimpinan;

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
        return view('pimpinan.pengaduan', compact('users'));
    }
}
