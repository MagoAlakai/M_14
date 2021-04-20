<?php

namespace App\Http\Controllers;
use App\Models\Shop;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return Shop::all();
    }

    public function show($id){
        return Shop::find($id);
    }

    public function store(Request $request){
        $shop = Shop::create($request->all());

        return response()->json($shop, 201);
    }

    public function update(Request $request, $id){

        $shop = Shop::findOrFail($id);
        $shop->update($request->all());

        return response()->json($shop, 200);
    }

    public function delete($id){
        $shop = Shop::findOrFail($id);
        $shop->delete();

        return response(null, 204);
    }
}
