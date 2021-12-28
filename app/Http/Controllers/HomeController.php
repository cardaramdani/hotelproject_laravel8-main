<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use DB;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // home page
    public function index()
    {
        $allBookings = DB::table('bookings')->get();
        return view('dashboard.home',compact('allBookings'));
    }

    // profile
    public function profile($id)
    {
        $where = array('id' => $id);
        $user  = User::where($where)->first();

        // $user = User::where('id', $id)->get();
        // return $user;
        return view('profile', compact('user'));
    }
    public function updateprofile(Request $request, User $user)
     {
        //  return $request;
        if ($request->name==Auth::user()->name)
            {$name=Auth::user()->name;}
            else {$request->validate(['name'=>'required|unique:users,name']);
        $name=$request->name;}

        if ($request->email==Auth::user()->email)
            {$request->email;}
            else {$request->validate(['email'=>'required|unique:users,email']);}

        if ($request->department==Auth::user()->department)
            {$request->department;}
            else {$request->validate(['department'=>'required']);}

        if ($request->phone_number==Auth::user()->phone_number)
            {$request->phone_number;}
            else{$request->validate(['phone_number'=>'required|max:14|']);}

        $request->validate(['avatar' => '|file|image|mimes:jpeg,png,jpg|max:2080']);
        $avatarlama=$request->avatarlama;
        $tmp = $request->file('avatar');

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'dataIMG_user';
         if ($tmp==0) {$nama_file= $avatarlama;}
         else{
            if(File::exists(public_path('dataIMG_user/'.$avatarlama))){
            File::delete(public_path('dataIMG_user/'.$avatarlama));
        }else{
            return back()->with('toast_error','Pict Gagal Diperbarui');
        }
            $nama_file = time()."_".$tmp->getClientOriginalName();
                    // upload file
         $tmp->move($tujuan_upload,$nama_file);

        }

        User::where ('id', $user->id)
        ->update([
            'name'=>$name,
            'last_name'=>$request->last_name,
            'addres'=>$request->addres,
            'nik'=>$request->nik,
            'negara'=>$request->negara,
            'agama'=>$request->agama,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'pendidikan'=>$request->pendidikan,
            'no_ktp'=>$request->no_ktp,
            'position'=>$request->position,
            'department'=>$request->department,
            'email'=>$request->email,
            'kelamin'=>$request->kelamin,
            'npwp'=>$request->npwp,
            'bpjstk'=>$request->bpjstk,
            'bpjskes'=>$request->bpjskes,
            'join_date'=>$request->join_date,
            'phone_number'=>$request->phone_number,
            'status'=>$request->status,
            'avatar'=>$request->avatar,

                ]);
        Toastr::success('Updated Profile successfully :)','Success');
        return redirect('/home');
    }
}
