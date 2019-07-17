<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Score;
class Score extends Model
{
    protected $table = 'scores';
    protected $fillable = ['student_id', 'class_id','step', 'subject_id','score_mieng', 'score_15','score_60', 'score_last'];
    public $timestamps = false;

    public function student(){
    	return $this->belongsTo('App\Student', 'student_id');
    }

    public function lop(){
    	return $this->belongsTo('App\Lop', 'class_id');
    }

    public function subject(){
    	return $this->belongsTo('App\Subject', 'subject_id');
    }

    public static function getScoreAverage($id){
    	$score = self::findOrFail($id);
    	if($score){
    		if($score->score_mieng && $score->score_15 && $score->score_60 && $score->score_last){
    			return ($score->score_mieng + $score->score_15  +  $score->score_60  +  $score->score_last) / 4; 
    		}
    	}
    }

    public static function search($student_id, $class_id, $subject_id, $step){
        $query = new Score();
        if(isset($student_id) && !empty($student_id)){
            $query = $query->where('student_id', $student_id);
        }

        if(isset($class_id) && !empty($class_id)){
            $query = $query->where('class_id', $class_id);
        }

        if(isset($subject_id) && !empty($subject_id)){
            $query = $query->where('subject_id', $subject_id);
        }

        if(isset($step) && !empty($step)){
            $query = $query->where('step', $step);
        }
        return $query->paginate(10);
    }
}
