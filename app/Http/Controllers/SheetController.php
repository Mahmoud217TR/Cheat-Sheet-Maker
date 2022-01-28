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

    public function getValidData(){
        return request()->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'theme'=>'required|int|min:1|max:4',
        ]);
    }

    public function index(){
        $sheets = auth()->user()->sheets;
        return view('sheets.index',compact('sheets'));
    }

    public function create(){
        $sheet = new Sheet();
        return view('sheets.create',compact('sheet'));
    }

    public function store(){
        $data = $this->getValidData();
        $data['author_id'] = auth()->id();
        
        Sheet::create($data);
        
        return redirect(route('sheets'));
    }

    public function show($id){
        $sheet=Sheet::findOrFail($id);
        $this->authorize('view',$sheet);
        return view('sheets.show',compact('sheet'));
    }

    public function edit($id){
        $sheet = Sheet::findOrFail($id);
        $this->authorize('update',$sheet);
        return view('sheets.edit',compact('sheet'));
    }

    public function update($id){
        $sheet = Sheet::findOrFail($id);
        $this->authorize('update',$sheet);
        $data = $this->getValidData();
        $sheet->update($data);
        return redirect(route('sheets.show',$sheet->id));
    }

    public function destroy($id){
        $sheet = Sheet::findOrFail($id);
        $this->authorize('delete',$sheet);
        $sheet->delete();
        return redirect(route('sheets'));
    }
}
