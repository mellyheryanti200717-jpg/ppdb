<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PpdbRegistration;
class PpdbController extends Controller {
    public function index() {
        $ppdbs = PpdbRegistration::latest()->get();
        return view("admin.ppdb.index", compact("ppdbs"));
    }
    public function destroy($id) {
        PpdbRegistration::findOrFail($id)->delete();
        return redirect()->back()->with("success", "Data dihapus");
    }
}
