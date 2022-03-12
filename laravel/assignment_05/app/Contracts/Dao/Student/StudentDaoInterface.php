<?php 
namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

interface StudentDaoInterface {
    public function storeStudent(Request $request);

    public function updateStudent(Request $request, $id);

    public function destroyStudent($id);

    public function getStudents(Request $request);

    public function studentList();

    public function majorCreate();

    public function findStudent($id);
}