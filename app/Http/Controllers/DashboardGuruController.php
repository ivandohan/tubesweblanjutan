<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class DashboardGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_id = 0;
        $total_savings = 0;
        $classes = Classroom::where('nip_guru', auth()->user()->nip)->get();

        foreach($classes as $item){
            $class_id = $item['id'];
        }

        $students_id = Student::where('grade_id', $class_id)->pluck('id');
        $jlhSiswa = Student::where('grade_id', $class_id)->count();

        foreach ($students_id as $id){
            $depo =  Saving::select('deposit')->where('student_id', $id)->where('status', '1')->pluck('deposit')->sum();
            $total_savings += $depo;
        }


        return view('guru.index',[
            'classes' => $classes,
            'jlhSiswa' => $jlhSiswa,
            'students' => Student::where('grade_id', $class_id)->paginate(5),
            'jlhDepo' => $total_savings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_id = 0;
        $student_nis = $request->nis;
        $students = Student::where('nis', $student_nis)->get();

        foreach ($students as $item){
            $student_id = $item['id'];
        }

        $input_savings = [
          'student_id' => $student_id,
            'user_id' => auth()->user()->id,
            'method_id' => 1,
            'deposit' => $request->deposit
        ];

        Saving::create($input_savings);

        return redirect('/guru')->with('success', 'Tabungan Berhasil Diinput!');
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
        //
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
    }

}
