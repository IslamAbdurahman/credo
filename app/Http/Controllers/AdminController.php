<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $roles = DB::table('roles')->select('roles.*')->get();

        if ($request->search){
            $search = $request->search;
            $admins = DB::table('users as u')
                ->join('roles as r','r.id','=','u.role')
                ->select('u.*','r.name as role_as')
                ->where('r.id','!=','0')
                ->where('u.name','like', '%'.$request->search.'%')
                ->get();

        }else {
            $search = '';
            $admins = DB::table('users as u')
                ->join('roles as r', 'r.id', '=', 'u.role')
                ->select('u.*', 'r.name as role_as')
                ->where('r.id', '!=', '0')
                ->get();
        }


        return view('admin.index',compact('admins','roles','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);


        if ($request->hasFile('image')){
            $filename = time().rand(1000, 9999).".".$request->image->extension();
            $request->image->move(public_path('assets-turist/images'),$filename);
//            $request->file('image')->storeAs('public/images',$filename);

            $admin = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
                'image'=>$filename,
            ]);

        }else{

            $admin = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
            ]);

        }
        if ($request->role == 0 ){
            return redirect()->route('buyer.index');

        }
        return redirect()->route('admin.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
//            'role'=>'required',
        ]);


        if ($request->hasFile('image')){
            $filename = time().rand(1000, 9999).".".$request->image->extension();
            $request->image->move(public_path('assets-turist/images'),$filename);
//            $request->file('image')->storeAs('public/images',$filename);

            $admin = User::find($id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            if ($request->role) {
                $admin->role = $request->role;
            }
            if (File::exists(public_path("assets-turist/images/".$admin->image))){
                File::delete(public_path("assets-turist/images/".$admin->image));
            }
            $admin->image = $filename;
            $admin->update();

            if (Auth::user()->id == $id){
                return redirect()->route('admin.edit',$id);

            }
            if ($admin->role == 0 ){
                return redirect()->route('buyer.index');

            }


            return redirect()->route('admin.index');

        }else{


            $admin = User::find($id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->update();

            if (Auth::user()->id == $id){
                return redirect()->route('admin.edit',$id);

            }
            if ($admin->role == 0 ){
                return redirect()->route('buyer.index');

            }

            return redirect()->route('admin.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        if (File::exists(public_path("assets-turist/images/".$admin->image))){
            File::delete(public_path("assets-turist/images/".$admin->image));
        }
        $admin->delete();

        if ($admin->role == 0 ){
            return redirect()->route('buyer.index');

        }

        return redirect()->route('admin.index');
    }
}
