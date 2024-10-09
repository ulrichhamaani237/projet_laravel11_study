<?php

namespace App\Http\Controllers;

use App\Models\WeekModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserTimeController extends Controller
{
    public function week_list(Request $request): View
    {
        $data['getRecord'] = WeekModel::get();
       

      return view('admin.week.list', $data);
    }

    public function week_add(Request $request): View
    {

        return view('admin.week.add');
    }

    public function week_store(Request $request){
        $save = new WeekModel; 
        $save->fill([
            'name' => trim($request->name)
        ]);
        if (!empty($request->name)) {
            $save->save();
        }   
        

         return redirect('admin/week')->with('success', 'Week added successfully!');

    }
    public function week_edit($id): View
    {
        $data['getRecord'] = WeekModel::find($id);
        return view('admin.week.edit', $data);
    }

    public function week_update(Request $request, $id){

        $record = WeekModel::find($id);
        $record->name = trim($request->name);
        $record->save();

        return redirect('admin/week')->with('success','week Updates successfully..!');
    }

    public function week_delete($id)
    {
        $record = WeekModel::find($id);
        $record->delete();
        return redirect('admin/week')->with('success','Week deleted successfully..!');
    }
}
