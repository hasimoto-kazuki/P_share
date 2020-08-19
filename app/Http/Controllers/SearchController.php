<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class SearchController extends Controller
{
    //
    public function index(Request $request){
        
        $query = User::query()->orderBy('id', 'desc');
      
        $search3 = $request->input('name');
        $search2 = $request->input('hobby');
      
        if ($request->has('name') && $search3 != '') {
            $query->where('name', 'like', '%'.$search3.'%')->get();
        }
        if ($request->has('hobby') && $search2 != ('指定なし')) {
            $query->where('hobby', $search2)->get();
        }
        
        
        
        $data = $query->paginate(10);

        return view('search.search',[
            'data' => $data
        ]);
    }
}
