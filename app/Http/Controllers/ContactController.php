<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller {
  public function submit(Request $r) {
    $d = $r->validate(['name'=>'required|string|max:120','phone'=>'required|string|max:30','email'=>'nullable|email|max:120','service'=>'required|string|max:60','message'=>'required|string|max:3000']);
    DB::table('inquiries')->insert(array_merge($d,['status'=>'new','created_at'=>now(),'updated_at'=>now()]));
    return redirect()->route('contact')->with('success','Thank you! We received your inquiry and will get back to you within 24 hours.');
  }
}
