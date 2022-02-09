<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sheet;
use App\Models\CheatField;

class FieldController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getValidData(){
        return request()->validate([
            'title'=>'string|nullable',
            'info'=>'string|nullable',
        ]);
    }

    public function convert($string){
        $string = str_replace('<','&lt;',$string);
        $string = str_replace('>','&gt;',$string);
        return $string;
    }

    public function index($id){
        $sheet = Sheet::findOrFail($id);
        $this->authorize('view',$sheet);

        return view('fields.index',compact('sheet'));
    }

    public function store($id){
        $sheet = Sheet::findOrFail($id);
        $this->authorize('update',$sheet);
        $data = $this->getValidData();
        $data['sheet_id'] = $id;

        CheatField::create($data);
        
        return back();
    }

    public function update($id){
        $field = CheatField::findOrFail($id);
        $sheet = $field->sheet;
        $this->authorize('update',$sheet);
        $data = $this->getValidData();
        $data['info'] = $this->convert($data['info']);
        $field->update($data);

        //flashAlert('success','Field Updated Successfuly','check it your Sheet');
        //return back();
    }

    public function destroy($id){
        $field = CheatField::findOrFail($id);
        $sheet = $field->sheet;
        $this->authorize('update',$sheet);
        $field->delete();

        flashAlert('success','Field Deleted Successfuly','no longer can be restored');
        //return back();
    }

    public function get($id){
        $sheet = Sheet::findOrFail($id);
        $this->authorize('view',$sheet);

        return $sheet->fields;
    }
}
