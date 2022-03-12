<?php

namespace App\Http\Controllers\Student;

use App\Major;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Contracts\Service\Student\StudentServiceInterface;

class StudentAPIController extends Controller
{

    private $studentServiceInterface;

    /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct(StudentServiceInterface $studentServiceInterface){
        $this->studentServiceInterface = $studentServiceInterface;
    }
    /**
     * show index page
     */
    public function showList() {
        return view('api.student.index');
    }

    /**
     * show create page
     */
    
    public function showCreate() {
        return view('api.student.create');
    }

    /**
     * show edit page
     */
    public function showEdit() {
        return view('api.student.edit');
    }

    //public function getMajors() {
    //    $majors = Major::all();
    //    return $majors;
    //}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->studentServiceInterface->studentList()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        
        $this->studentServiceInterface->storeStudent($request);
        return "inserted successfully!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->studentServiceInterface->findStudent($id);
        return $student;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $student = $this->studentServiceInterface->updateStudent($request, $id);

        // Check student is updated successfully or not
        if ($student) {
            return 'Student updated successfully';
        } else {
            return 'Something went wrong. Please try again!';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->studentServiceInterface->destroyStudent($id);
        return "deleted successfully!";
        
    }
}
