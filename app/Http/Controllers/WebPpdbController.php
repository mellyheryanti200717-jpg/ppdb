<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PpdbRegistration;
class WebPpdbController extends Controller {
    public function create() {
        return view("ppdb.create");
    }
    public function store(Request $request) {
        $data = $request->validate([
            "nama_lengkap" => "required",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required|date",
            "alamat" => "required",
            "asal_sekolah" => "required",
            "no_telp" => "required",
        ]);
        PpdbRegistration::create($data);
        return redirect()->route("ppdb.success");
    }
    public function success() {
        return view("ppdb.success");
    }
}
