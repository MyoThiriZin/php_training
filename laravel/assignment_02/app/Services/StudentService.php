<?php 

namespace App\Services\Student;

use Illuminate\Http\Request;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Service\Student\StudentServiceInterface;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentService implements StudentServiceInterface {

    private $studentDaoInterface;

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

    public function getStudents(Request $request)
    {
        return $this->studentDaoInterface->getStudents($request);
    }

    public function studentList()
    {
        return $this->studentDaoInterface->studentList();
    }
    public function export(){

        return $this->studentDao->export();
    }

    public function import(){

        return $this->studentDao->import();
    }
}
