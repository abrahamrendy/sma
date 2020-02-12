<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class BackOfficeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrant = DB::table('contactus')->orderBy('id', 'desc')->get();
        return view('admin.dashboard', compact('registrant'));
    }

    public function details($id, $page=0)
    {
        $user_data = DB::table('contactus')->where('id',$id)->get();
        $page_init = "Registrant Details";

        $data = [
                'title' => 'Detail Registrant',
                'page_init' => $page_init,
                'page' => $page,
                'product' => $user_data[0],
            ];
        return view('admin.detailRegistrant', $data);
    }

    public function edit($id, $page =0) {
        $user_data = DB::table('contactus')->where('id',$id)->get();
        $page_init = "Registrant Details";

        $data = [
                'title' => 'Edit Registrant',
                'page_init' => $page_init,
                'page' => $page,
                'product' => $user_data[0],
            ];
        return view('admin.editRegistrant', $data);
    }

    public function submit_edit (Request $request) {
        $id = strip_tags($request->input('id'));
        $name = strip_tags($request->input('name'));
        $gender = strip_tags($request->input('gender'));
        $email = strip_tags($request->input('email'));
        $alamat = strip_tags($request->input('alamat'));
        $statuspelayanan = strip_tags($request->input('statuspelayanan'));
        $phone = strip_tags($request->input('phone'));
        $ttl = strip_tags($request->input('ttl'));
        $praktek = strip_tags($request->input('praktek'));
        $message = $request->input('message');

        $user_data = DB::table('contactus')->where('id','=', $id)->get();


        if ($request->hasFile('akte')){
            $photoname = $request->input('name').'_AKTE';
            $addPhoto = $photoname.'.'.$request->file('akte')->getClientOriginalExtension();
            $akte = Storage::putFileAs('akte', $request->file('akte'), $addPhoto);
        } else {
            $akte = $user_data[0]->akte;
        }

        if ($request->hasFile('ktp')){
            $photoname = $request->input('name').'_KTP';
            $addPhoto = $photoname.'.'.$request->file('ktp')->getClientOriginalExtension();
            $ktp = Storage::putFileAs('ktp', $request->file('ktp'), $addPhoto);
        } else {
            $ktp = $user_data[0]->ktp;
        }

        if ($request->hasFile('ijazah')){
            $photoname = $request->input('name').'_IJAZAH';
            $addPhoto = $photoname.'.'.$request->file('ijazah')->getClientOriginalExtension();
            $ijazah = Storage::putFileAs('ijazah', $request->file('ijazah'), $addPhoto);
        } else {
            $ijazah = $user_data[0]->ijazah;
        }

        if ($request->hasFile('pasfoto')){
            $photoname = $request->input('name').'_PASFOTO';
            $addPhoto = $photoname.'.'.$request->file('pasfoto')->getClientOriginalExtension();
            $pasfoto = Storage::putFileAs('pasfoto', $request->file('pasfoto'), $addPhoto);
        } else {
            $pasfoto = $user_data[0]->pasfoto;
        }

        if ($user_data) {
            DB::table('contactus')->where('id','=',$id)->update(
                [
                    'name' => $name,
                    'gender' => $gender,
                    'email' => $email,
                    'alamat' => $alamat,
                    'statuspelayanan' => $statuspelayanan,
                    'phone' => $phone,
                    'ttl' => $ttl,
                    'praktek' => $praktek,
                    'message' => $message,
                    'akte' => $akte,
                    'ktp' => $ktp,
                    'ijazah' => $ijazah,
                    'pasfoto' => $pasfoto,
                ]
            );
        }

        return redirect()->route('bo')->with('addProduct', 'Registrant successfully updated!');
    }

    public function approve_user (Request $request) {

        $id = strip_tags($request->input('id'));

        $user_data = DB::table('contactus')->where('id','=',$id)->update(['status' => 1]);

        // return redirect()->route('bo')->with('addProduct', 'Registrant successfully approved!');
        return 1;
    }

    public function reject_user (Request $request) {

        $id = strip_tags($request->input('id'));

        $user_data = DB::table('contactus')->where('id','=',$id)->update(['status' => 2]);

        // return redirect()->route('bo')->with('addProduct', 'Registrant successfully approved!');
        return 1;
    }



    public function bukti_bayar()
    {
        $registrant = DB::table('paymentconfirmation')->orderBy('id', 'desc')->get();
        return view('admin.buktibayar', compact('registrant'));
    }

    public function materi(){
        $materi = DB::table('modul')->orderBy('id', 'desc')->get();
        return view('admin.materi', compact('materi'));
    }
}
