<?php 
namespace App\Dao\Student;

use App\Major;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function getStudents(Request $request)
    {
        $name = $request->keyword;
        $students = DB::table('students as student')
            ->join('majors as major', 'student.major_id', '=', 'major.id')
            ->select('student.*', 'major.name as major_name');
        if ($name) {
            $students->where('student.first_name', 'LIKE', '%' . $name . '%')
            ->orWhere('student.last_name', 'LIKE', '%' . $name . '%')
            ->orWhere('student.email', 'LIKE', '%' . $name . '%')
            ->orWhere('student.phone', 'LIKE', '%' . $name . '%')
            ->orWhere('student.address', 'LIKE', '%' . $name . '%')
            ->orWhere('major.name', 'LIKE', '%' . $name . '%');
        }

        return $students->latest()->get();
    }

    public function studentList(){
       return DB::table('students as student')
        ->join('majors as major', 'student.major_id', '=', 'major.id')
        ->select('student.*', 'major.name as major');
    }

    public function majorCreate()
    {
        $majors = Major::all();
        return $majors;
    }

    public function findStudent($id)
    {
        $student = Student::find($id);
        return $student;
    }
    
}