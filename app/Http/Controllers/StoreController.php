<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::orderBy('id','desc')->paginate(5);
        return view('admin.coupon.store.index',compact('stores'));
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
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'home_url'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($request->file('image')){
            $image = $request->file('image');
            $new_name = time().'.'.$image-> getClientOriginalExtension();
            $image->move(public_path("image"), $new_name);
        }
        Store::create(
            [
                'name'=> request()->get('name'),
                'slug'=> request()->get('slug'),
                'description' => request()->get('description'),
                'home_url' => request()->get('home_url'),
                'image'=>$new_name,
                'user_id'=>Auth::id(),
            ]
        );

        return back();
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
        //
    }
}
