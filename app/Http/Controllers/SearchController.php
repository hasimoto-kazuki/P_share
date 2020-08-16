<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class SearchController extends Controller
{
    //
    public function index(Request $request){
        
        $query = User::orderBy('id', 'desc');
      
        $search3 = $request->input('name');
      
        if ($request->has('name') && $search3 != '') {
            $query->where('name', 'like', '%'.$search3.'%')->get();
        }
        
        
        
        $data = $query->paginate(10);

        return view('search.search',[
            'data' => $data
        ]);
    }
}
