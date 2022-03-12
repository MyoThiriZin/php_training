<?php 
namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

interface StudentDaoInterface {
    public function storeStudent(Request $request);

    public function updateStudent(Request $request, $id);

    public function destroyStudent($id);

    public function export();

    public function import();
    
    public function studentsSearch($search);
}