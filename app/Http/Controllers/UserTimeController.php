<?php

namespace App\Http\Controllers;

use App\Models\Week_time;
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

    /**
     * @author ulrich_dev
     * @description week time list view controller for admin panel 
     * @param Request
     */

    public function week_time_list(Request $request): View{
         
        $data['getRecord'] = Week_time::get();

        return view('admin.week_time.list', $data);

    }

    /**
     * @author ulrich_dev
     * @description week time add view controller for admin panel 
     * @param Request
     */
    public function week_time_add(Request $request): View{

        return view('admin.week_time.add');

    }

    /**
     * @author ulrich_dev
     * @description week time store controller for admin panel 
     * @param Request
     */
    public function week_time_store(Request $request){
       $record = new Week_time;
       $record->name = trim($request->name);
       $record->save();
       return redirect('admin/week_time')->with('success','Week time added successfully');
    }

    /**
     * @author ulrich_dev
     * @description week time edit view controller for admin panel 
     * @param Request
     */
    public function week_time_edit($id) : View{
       
         $data['getRecord'] = Week_time::find($id);
        return view('admin.week_time.edit', $data);
        
    }
  public function week_time_edit_store(Request $request, $id){
    $record= Week_time::find($id);
    $record->name = trim($request->name);
    $record->save();

    return redirect('admin/week_time')->with('success','Week time updated successfully');
  }
     
 /**
     * @author ulrich_dev
     * @description week time delete controller for admin panel 
     * @param Request
*/

 public function week_time_delete (Request $request, $id){

     $record = Week_time::find($id);
     $record->delete();
     return redirect('admin/week_time')->with('success','Week time deleted successfully');

 }

 public function admin_schedule(Request $request): View
 {
    $data['week'] = WeekModel::get();
    $data['week_time_row'] = Week_time::get();
    return view('admin.schedule.list', $data);
 }

}
