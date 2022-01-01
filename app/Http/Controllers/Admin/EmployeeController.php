<?php



namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Validator;
use Image;


class EmployeeController extends Controller

{
   

    public function index(Request $request){ 
    $employees = Employee::get();
    //dd($products);
    $page_title = 'Manage employees';
    return view('admin/employee/index', compact('page_title', 'employees'));    
   }

     public function create(Request $request){ 
                
       $page_title = 'Add employees';
       return view('admin/employee/add', compact('page_title'));    
      }

     public function store(Request $request){ 
      $Employee = new Employee;
      $Employee->name = $request->name;
      $Employee->email = $request->email;
      $Employee->position = $request->position;
      $Employee->year_of_service = $request->year_of_service;
      $Employee->performance = $request->performance;
      $Employee->others = $request->others;
      $Employee->save();


     return redirect()->route('admin.employee.show')->with('success', 'saved');

            
   }

     public function show($id) {
        $employee = Employee::where('id', '=', $id)->first();
        
        return view('admin/employee/edit', compact('employee'));    
    }

     public function update(Request $request, $id) {
      $Employee = Employee::where('id', '=', $id)->first();
      $Employee->name = $request->name;
      $Employee->email = $request->email;
      $Employee->position = $request->position;
      $Employee->year_of_service = $request->year_of_service;
      $Employee->performance = $request->performance;
      $Employee->others = $request->others;
      $Employee->save();
        
         return redirect()->route('admin.employee.show')->with('success', 'saved');
    }


      public function destroy($id) {
        $p = Employee::find($id); 
        $p->delete(); //delete the client
        return redirect()->route('admin.employee.show')->with('success', 'saved');
    }


    

}

