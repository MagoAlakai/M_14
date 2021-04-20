<?php

namespace App\Http\Controllers;
use App\Models\Painting;

use Illuminate\Http\Request;

class PaintingController extends Controller
{
    public function index($id){
        $paintings = Painting::where('tienda_id', $id)->get();

        return response()->json($paintings, 200);
    }

    public function index_all(){
        return Painting::all();
    }

    public function show($id){
        return Painting::find($id);
    }

    public function store(Request $request){
        $painting = Painting::create($request->all());

        return response()->json($painting, 201);
    }

    public function update(Request $request, $id){

        $painting = Painting::findOrFail($id);
        $painting->update($request->all());

        return response()->json($painting, 200);
    }

    public function delete($id){
        $painting = Painting::findOrFail($id);
        $painting->delete();

        return response(null, 204);
    }

    public function delete_all($id){
        Painting::where('tienda_id', $id)->delete();

        return response(null, 204);
    }
}
