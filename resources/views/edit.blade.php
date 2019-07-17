@extends('master')
@section('title', 'Cập nhật sinh viên')
@section('content')
	<form id="formCreateScore" action="{{ route('score.update', $score) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group" >
			<div class="row  mb-3">
				<div class="col-md-6 mb-3">
					<select name="student_id" class="form-control">
				      	@foreach($students as $student)
					      	@if($score->student_id == $student->id)
				      			<option selected value="{{ $score->student_id }}">{{ $student->name }}</option>
				      		@else
					      		<option value="{{ $student->id }}">{{ $student->name }}</option>
				      		@endif
				      	@endforeach 
				    </select>
				</div>
				<div class="col-md-6 mb-3">
					<select name="class_id" class="form-control">
				      	@foreach($classes as $class)
				      		@if($score->class_id == $class->id)
				      			<option selected value="{{ $score->student_id }}">{{ $class->name }}</option>
				      		@else
					      		<option value="{{ $class->id }}">{{ $class->name }}</option>
				      		@endif
				      	@endforeach 
				    </select>
				</div>
			</div>
	    </div>
	    <div class="form-group" >
			<div class="row  mb-3">
				<div class="col-md-6 mb-3">
					<select name="subject_id" class="form-control">
				      	@foreach($subjects as $subject)
				      		@if($score->subject_id == $subject->id)
				      			<option selected value="{{ $score->student_id }}">{{ $subject->name }}</option>
				      		@else
					      		<option value="{{ $subject->id }}">{{ $subject->name }}</option>
				      		@endif
				      		
				      	@endforeach 
				    </select>
				</div>
				<div class="col-md-6 mb-3">
					<select name="step" class="form-control">
				      	@if($score->step == 1)
							<option value="1" selected>Học kì 1</option>
							<option value="2">Học kì 2</option>
				    	@else
							<option value="2" selected>Học kì 2</option>
							<option value="1" >Học kì 1</option>
				    	@endif
				    </select>
				</div>
			</div>
	    </div>
	    <div class="form-group" >
			<div class="row  mb-3">
				<div class="col-md-6 mb-3">
					<input type="text" name="score_mieng" class="form-control" placeholder="Điểm miệng" value="{{ $score->score_mieng }}">
				</div>
				<div class="col-md-6 mb-3">
					<input type="text" name="score_15" class="form-control" placeholder="Điểm 15 phút" value="{{ $score->score_15 }}">
				</div>
			</div>
	    </div>
	    <div class="form-group">
	    	<div class="row  mb-3">
				<div class="col-md-6 mb-3">
					<input type="text" name="score_60" class="form-control" placeholder="Điểm 1 tiết" value="{{ $score->score_60 }}">
				</div>
				<div class="col-md-6 mb-3">
					<input type="text" name="score_last" class="form-control" placeholder="Điểm thi" value="{{ $score->score_last }}">
				</div>
			</div>
	    </div>
	    <div class="form-group">
	    	<div class="d-flex flex-row-reverse bd-highlight">
			  	<button class="btn btn-success" type="submit">Cập nhật</button>
			</div>
	    </div>
	</form>
	<script type="text/javascript">
		$( document ).ready(function() {
		    $("#formCreateScore").validate({
			    rules:{
			        score_mieng: "number",
			        score_15: "number",
			        score_60: "number",
			        score_last: "number"
			    },
				messages: {
					score_mieng: "Điểm miệng phải là số" ,
					score_15: "Điểm 15 phút phải là số" ,
					score_60: "Điểm 1 tiết phải là số" ,
					score_last: "Điểm thi phải là số" ,
				}
			});
		});
	</script>
@endsection
