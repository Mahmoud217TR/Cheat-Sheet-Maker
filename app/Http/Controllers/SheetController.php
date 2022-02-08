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
            'theme'=>'required|int|min:1|max:5',
        ]);
    }

    public function increaseVisits($sheet){
        $sheet->visits = $sheet->visits+1;
        $sheet->save();
    }

    public function paginate($sheets){
        $pageSize = 5;
        return $sheets->simplePaginate($pageSize);
    }

    public function index(){
        $sheets = $this->paginate(auth()->user()->sheets());
        return view('sheets.index',compact('sheets'));
    }

    public function pinned(){
        $sheets = $this->paginate(auth()->user()->sheets()->pinned());
        return view('sheets.index',compact('sheets'));
    
    }
    public function mostVisited(){
        $m = auth()->user()->most_visited_filter;
        $sheets = $this->paginate(auth()->user()->sheets()->where('visits','>',0)->orderBy('visits', 'desc')->take($m));
        return view('sheets.index',compact('sheets'));
    }

    public function create(){
        $sheet = new Sheet();
        return view('sheets.create',compact('sheet'));
    }

    public function store(){
        $data = $this->getValidData();
        $data['author_id'] = auth()->id();
        $data['pinned'] = false;
        $data['visits'] = 0;
        
        $sheet = Sheet::create($data);
        flashAlert('success','Sheet Created Successfuly','check it in your cheat sheets');
        return redirect(route('sheets.show',$sheet->id));
    }

    public function show($id){
        $sheet=Sheet::findOrFail($id);
        $this->authorize('view',$sheet);
        
        return view('sheets.show',compact('sheet'));
    }

    public function visit($id){
        $sheet=Sheet::findOrFail($id);
        $this->authorize('view',$sheet);
        $this->increaseVisits($sheet);
        return redirect(route('sheets.show',$id));
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
        flashAlert('success','Sheet Edited Successfuly','check it your edits');
        return redirect(route('sheets.show',$sheet->id));
    }

    public function destroy($id){
        $sheet = Sheet::findOrFail($id);
        $this->authorize('delete',$sheet);
        $sheet->delete();
        flashAlert('success','Sheet Deleted Successfuly','no longer can be restored');
        // return redirect(route('sheets'));
        if(back()->getTargetUrl() != route('sheets.show',$id)){
            return back()->getTargetUrl();
        }
        return route('sheets');
    }

    public function search(){
        $keyword = request('keyword');
        $sheets = auth()->user()->sheets()->where('title','like',"%{$keyword}%")->get();
        return view('sheets.index',compact('sheets'));
    }

    public function togglePin($id){
        $sheet = Sheet::findOrFail($id);
        $this->authorize('update',$sheet);
        $sheet->pinned = !$sheet->pinned;
        $sheet->save();
        return $sheet->pinned;
    }
}
