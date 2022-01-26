<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $sheets = auth()->user()->sheets;
        return view('sheets.index',compact('sheets'));
    }

    public function create(){
        return view('sheets.create');
    }

    public function store(){
        $data = request()->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'theme'=>'required|int|min:1|max:3',
        ]);
        $data['author_id'] = auth()->id();
        
        Sheet::create($data);
        
        return redirect(route('sheets'));
    }
}
