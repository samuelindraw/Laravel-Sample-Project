<?php

namespace App\Http\Controllers;
use App\student;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
		return view('student', 
        [
            'title' => 'Student Data',
            "active" =>'student',
            'student'=> $student
        ]);
    }
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
		// menangkap file excel
		$file = $request->file('file');
		// membuat nama file unik
		$filename = rand().$file->getClientOriginalName();
		// upload ke folder file_siswa di dalam folder public
		$file->move('file',$filename);
		// import data
		Excel::import(new StudentImport, public_path('/file/'.$filename));
		// alihkan halaman kembali
		return redirect('/student')->with('success','Data Berhasil diimport');
	}
    public function export_excel()
	{
		return Excel::download(new StudentsExport, 'Student- ' . time() . '.xlsx');
        
	}
    public function cetak_pdf()
    {
    	$student = Student::all();
    	$pdf = PDF::loadview('Student_PDF',['student'=>$student]);
    	return $pdf->download('Student-Report'. time().'.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
