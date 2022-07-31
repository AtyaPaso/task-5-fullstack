<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use Auth;

class ArticlesController extends Controller
{
    public function all() 
    {
        $articles = Articles::all();
        $response = ['data' => $articles];
        return response()->json($response);
    }

    public function create(Request $request){
        $new = new Articles;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->user_id = 11;
        $new->category_id = 1;
        $new->save();
        return response()->json(['message' => 'Data Successfully inserted']);
    }

    public function delete(Request $request){
        $data = Articles::where('id', $request->id);
        $data->delete();
        return response()->json(['message'=>'Data succesfully deleted']);
    }

    public function detail($articlesId)
    {
        $article = Articles::where('id', $articlesId)->get();
        return response()->json($article);
    }
}
