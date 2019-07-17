<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\Student;
use App\Lop;
use App\Subject;
class ScoreController extends Controller
{
    protected $score;

    public function __construct(Score $score){
        $this->score = $score;
    }
    public function index(Request $request)
    {
        if($request->student_id || $request->class_id ||  $request->subject_id ||  $request->step  ){
            $items = $this->score->search($request->student_id, $request->class_id,$request->subject_id , $request->step);
        }else{
            $items = $this->score->orderBy('id','desc')->paginate(10);
        }
        $students = Student::all();
        $classes = Lop::all();
        $subjects = Subject::all();
        return view('score', compact('items','students', 'classes', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $classes = Lop::all();
        $subjects = Subject::all();
        return view('create', compact('students', 'classes', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $score = new Score;
        $score->student_id = $request->student_id;
        $score->class_id = $request->class_id;
        $score->step = $request->step;
        $score->subject_id = $request->subject_id;
        $score->score_mieng = $request->score_mieng;
        $score->score_15 = $request->score_15;
        $score->score_60 = $request->score_60;
        $score->score_last = $request->score_last;
        $score->save();
        return redirect()->route('score.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $score = Score::findOrFail($id);
        return view('detail', compact('score'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $score = Score::findOrFail($id);
        $students = Student::all();
        $classes = Lop::all();
        $subjects = Subject::all();
        return view('edit', compact('students', 'classes', 'subjects', 'score'));
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
        $score = Score::findOrFail($id) ;
        $score->student_id = $request->student_id;
        $score->class_id = $request->class_id;
        $score->step = $request->step;
        $score->subject_id = $request->subject_id;
        $score->score_mieng = $request->score_mieng;
        $score->score_15 = $request->score_15;
        $score->score_60 = $request->score_60;
        $score->score_last = $request->score_last;
        $score->save();
        return redirect()->route('score.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Score::findOrFail($id)->delete();
        return redirect()->route('score.index');
    }
}
