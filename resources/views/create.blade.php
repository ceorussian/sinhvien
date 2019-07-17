@extends('master')
@section('title', 'Thêm sinh viên')
@section('content')
	<form id="formCreateScore" action="{{ route('score.store') }}" method="POST">
		@csrf
		<div class="form-group" >
			<div class="row  mb-3">
				<div class="col-md-6 mb-3">
					<select name="student_id" class="form-control">
						<option value="">--- Chọn sinh viên ---</option>
				      	@foreach($students as $student)
				      		<option value="{{ $student->id }}">{{ $student->name }}</option>
				      	@endforeach 
				    </select>
				</div>
				<div class="col-md-6 mb-3">
					<select name="class_id" class="form-control">
						<option value="">--- Chọn lớp ---</option>
				      	@foreach($classes as $class)
				      		<option value="{{ $class->id }}">{{ $class->name }}</option>
				      	@endforeach 
				    </select>
				</div>
			</div>
	    </div>
	    <div class="form-group" >
			<div class="row  mb-3">
				<div class="col-md-6 mb-3">
					<select name="subject_id" class="form-control">
						<option value="">--- Chọn môn học ---</option>
				      	@foreach($subjects as $subject)
				      		<option value="{{ $subject->id }}">{{ $subject->name }}</option>
				      	@endforeach 
				    </select>
				</div>
				<div class="col-md-6 mb-3">
					<select name="step" class="form-control">
						<option value="">--- Chọn học kì ---</option>
				      	<option value="1">Học kì 1</option>
				      	<option value="2">Học kì 2</option>
				    </select>
				</div>
			</div>
	    </div>
	    <div class="form-group" >
			<div class="row  mb-3">
				<div class="col-md-6 mb-3">
					<input type="text" name="score_mieng" class="form-control" placeholder="Điểm miệng">
				</div>
				<div class="col-md-6 mb-3">
					<input type="text" name="score_15" class="form-control" placeholder="Điểm 15 phút">
				</div>
			</div>
	    </div>
	    <div class="form-group">
	    	<div class="row  mb-3">
				<div class="col-md-6 mb-3">
					<input type="text" name="score_60" class="form-control" placeholder="Điểm 1 tiết">
				</div>
				<div class="col-md-6 mb-3">
					<input type="text" name="score_last" class="form-control" placeholder="Điểm thi">
				</div>
			</div>
	    </div>
	    <div class="form-group">
	    	<div class="d-flex flex-row-reverse bd-highlight">
			  	<button class="btn btn-success" type="submit">Thêm</button>
			</div>
	    </div>
	</form>
	<script type="text/javascript">
		$( document ).ready(function() {
		    $("#formCreateScore").validate({
			    rules:{
			    	student_id:"required",
			    	class_id: "required",
			        step: "required",
			        subject_id:"required",
			        score_mieng: "number",
			        score_15: "number",
			        score_60: "number",
			        score_last: "number"
			    },
				messages: {
					student_id: "Vui lòng chọn sinh viên !",
					class_id: "Vui lòng chọn lớp học !",
					step: "Vui lòng chọn học kì !",
					subject_id: "Vui lòng chọn môn học !",
					score_mieng: "Điểm miệng phải là số" ,
					score_15: "Điểm 15 phút phải là số" ,
					score_60: "Điểm 1 tiết phải là số" ,
					score_last: "Điểm thi phải là số" ,
				}
			});
		});
	</script>
@endsection
