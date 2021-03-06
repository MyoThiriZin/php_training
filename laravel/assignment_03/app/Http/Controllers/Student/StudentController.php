<?php

namespace App\Http\Controllers\Student;

use App\Major;
use App\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Http\Requests\CSVRequest;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StudentRequest;
use App\Contracts\Service\Student\StudentServiceInterface;

/**
 * This is Student controller.
 * This handles Student CRUD processing.
 */
class StudentController extends Controller
{
     /**
   * student interface
   */

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
   * To show  student view
   * 
   * @return View student
   */
    public function index()
    {
        //
        $students = Student::all();
        return view('student.index',compact('students'));
    }

     /**
   * To show create student view
   * 
   * @return View create student
   */
    public function create()
    {
        //
        $majors = Major::all();
        return view('student.create',compact('majors'));
    }

    /**
   * To submit student create view
   * @param StudentRequest $request
   * @return View students list
   */
    public function store(StudentRequest $request)
    {
        $this->studentServiceInterface->storeStudent($request);

        return redirect('/students')->with('success', 'You have successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = Student::find($id);
        return view('student.index',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Student::find($id);
        $majors = Major::all();
        return view('student.edit',compact('student','majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $this->studentServiceInterface->updateStudent($request,$id);
        return redirect('/students')->with('success','You have successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentServiceInterface->destroyStudent($id);
        return redirect('/students')->with('success','You have successfully deleted.');
    }

     /**
    * @return \Illuminate\Support\Collection
    *
     * for import and export view
    */
    public function export()
    {
        return $this->studentServiceInterface->export();
    }

    public function import()
    {
        $this->studentServiceInterface->import();
        return redirect()->back();
    }

    public function importExportCsv()
    {
       return view('import');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        $students =  $this->studentServiceInterface->studentsSearch($search);

        return view('search', ['students' => $students]);
    }
}
