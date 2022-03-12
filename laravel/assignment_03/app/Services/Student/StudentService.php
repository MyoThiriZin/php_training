<?php 

namespace App\Services\Student;

use Illuminate\Http\Request;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Service\Student\StudentServiceInterface;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentService implements StudentServiceInterface {

    private $studentDaoInterface;
    public function getstudent()
    {
        return $this->studentDaoInterface->getstudent();
    }

    public function getmajor()
    {
        return $this->studentDaoInterface->getmajor();
    }
    public function __construct(StudentDaoInterface $studentDaoInterface)
    {
        $this->studentDaoInterface = $studentDaoInterface;
    }

    public function storeStudent(Request $request){
        return $this->studentDaoInterface->storeStudent($request);
    }

    public function updateStudent(Request $request, $id){
        return $this->studentDaoInterface->updateStudent($request,$id);
    }

    public function destroyStudent($id){
        return $this->studentDaoInterface->destroyStudent($id);
    }
    public function export(){

        return $this->studentDaoInterface->export();
    }

    public function import(){

        return $this->studentDaoInterface->import();
    }
    public function studentsSearch($search){

        return $this->studentDaoInterface->studentsSearch($search);
    }
}