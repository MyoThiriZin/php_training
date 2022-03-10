<?php 
namespace App\Dao\Student;

use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Student;
use Illuminate\Http\Request;
use App\Contracts\Dao\Student\StudentDaoInterface;

class StudentDao implements StudentDaoInterface {

    public function storeStudent(Request $request){
        return Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'major_id' => $request->major_id,
        ]);
    }

    public function updateStudent(Request $request, $id){
        return  Student::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'major_id' => $request->major_id
        ]);
    }

    public function destroyStudent($id){
        return Student::find($id)->delete();
    }
    public function export(){

        return Excel::download(new StudentsExport, 'students.csv');
    }
  
    public function import(){
  
        return Excel::import(new StudentsImport,request()->file('file'));
    }
}