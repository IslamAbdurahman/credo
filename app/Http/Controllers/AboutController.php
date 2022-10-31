<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->search){
            $abouts = \Illuminate\Support\Facades\DB::select('select * from about where head like "%'.$request->search.'%"');

            $search = $request->search;
        }else{
            $abouts = \Illuminate\Support\Facades\DB::select('select * from about');

            $search = '';
        }

        return view('admin.about.index', compact('abouts','search'));
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
            'head'=>'required',
            'text'=>'required',
        ]);

        $about = About::find(1);
        $about->head = $request->head;
        $about->text = $request->text;
        $about->update();


//        $about = About::create([
//            'head'=>$request->head,
//            'text'=>$request->text,
//        ]);

        return redirect()->route('about.index');
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
//        $about = About::find($id);
//
//        $about->delete();
//
//
//        return redirect()->route('about.index');
    }
}
