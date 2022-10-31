<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Travel;
use Illuminate\Support\Facades\File;


class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->search){
            $travels = \Illuminate\Support\Facades\DB::select('select * from trips where country like "%'.$request->search.'%"');

            $search = $request->search;
        }else{
            $travels = \Illuminate\Support\Facades\DB::select('select * from trips');

            $search = '';
        }

        return view('admin.travel.index', compact('travels','search'));
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
            'country'=>'required',
            'city'=>'required',
            'price'=>'required',
            'text'=>'required',
        ]);


        if ($request->hasFile('img')){
            $filename = time().rand(1000, 9999).".".$request->img->extension();
            $request->img->move(public_path('assets-turist/images'),$filename);
//            $request->file('img')->storeAs('public/images',$filename);

            $travel = Travel::create([
                'country'=>$request->country,
                'city'=>$request->city,
                'price'=>$request->price,
                'img'=>$filename,
                'text'=>$request->text,
            ]);

        }else{

            $travel = Travel::create([
                'country'=>$request->country,
                'city'=>$request->city,
                'price'=>$request->price,
                'img'=>'noimage',
                'text'=>$request->text,
            ]);

        }
            return redirect()->route('travel.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travel = Travel::find($id);
        if (File::exists(public_path("app/public/images/".$travel->img))){
            File::delete(public_path("app/public/images/".$travel->img));
        }
        $travel->delete();


        return redirect()->route('travel.index');
    }
}
