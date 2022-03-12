<?php

namespace App\Http\Controllers\Student;

use App\Major;
use App\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Http\Requests\CSVRequest;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        //
        $students =  $this->studentServiceInterface->getStudents($request);

        return view('student.index',compact('students'));
    }


     /**
   * To show create student view
   * 
   * @return View create student
   */
    public function create()
    {
        $majors = $this->studentServiceInterface->majorCreate();
        return view('student.create',compact('majors'));
    }

     /**
   * To  create major
   * 
   */
    public function majorCreate()
    {
        return $this->studentServiceInterface->majorCreate();
    }

    /**
   * To submit student create view
   * @param StudentRequest $request
   * @return View students list
   */
    public function store(StudentRequest $request)
    {
        $this->studentServiceInterface->storeStudent($request);

        $this->studentServiceInterface->sendCreateMail($request->email);

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
        $student = $this->studentServiceInterface->findStudent($id);
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
        $student = $this->studentServiceInterface->findStudent($id);
        $majors = $this->studentServiceInterface->majorCreate();
        return view('student.edit',compact('student','majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $student = $this->studentServiceInterface->findStudent($id);
        $this->studentServiceInterface->destroyStudent($id);
        $this->studentServiceInterface->sendDeleteMail($student->email);
        return redirect('/students')->with('success','You have successfully deleted.');
    }

     /**
    * @return \Illuminate\Support\Collection
    *
     * for import and export view
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    *
     * export view
    */
    public function export() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    *
     * import view
    */
    public function import(Request $request) 
    {
        Excel::import(new StudentsImport,$request->file('file'));
        return back();
    }
}
