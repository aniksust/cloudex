<?php

namespace App\Http\Controllers\Admin;

use App\Models\Purchasedgoods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods=DB::table('purchasedgoods')
            ->join('products','products.id','purchasedgoods.product_id')
            ->join('brands','brands.id','products.brand_id')
            ->get()->toArray();
        //name is brand name


        $abc=DB::table('purchasedgoods')
            ->join('users','users.id','purchasedgoods.user_id')
            ->join('roles','roles.id','users.role_id')
        ->get()->toArray();
        //vendor is brand name

//        $bb=$goods->$abc;
//
//        dd($abc);

        return view("admin.Author.index")->with('abc',$abc)->with('goods', $goods);
//        return $goods;




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
        //
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
