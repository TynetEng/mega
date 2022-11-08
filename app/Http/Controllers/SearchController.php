<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Search;

class SearchController extends Controller
{
    public function query(Request $request)
    {
        if($request->has('search')){
            $blogs= Blog::where('content', 'like', '%' . request('search') . '%')->get();
           
            $show = User::get();
            
        }else{
            $blogs= Blog::get();
        }
        return view('search.index', ['blogs'=>$blogs, 'show'=>$show]);
    }
}
