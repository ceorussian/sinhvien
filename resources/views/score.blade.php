@extends('master')
@section('title', 'Danh sách sinh viên')
@section('content')
	<form method="GET">
		<div class="form-group" >
			<div class="row  mb-3">
				<div class="col-md-3 mb-3">
					<select name="student_id" class="form-control">
						<option value="">--- Chọn sinh viên ---</option>
				      	@foreach($students as $student)
				      		<option value="{{ $student->id }}">{{ $student->name }}</option>
				      	@endforeach 
				    </select>
				</div>
				<div class="col-md-3 mb-3">
					<select name="class_id" class="form-control">
						<option value="">--- Chọn lớp ---</option>
				      	@foreach($classes as $class)
				      		<option value="{{ $class->id }}">{{ $class->name }}</option>
				      	@endforeach 
				    </select>
				</div>
				<div class="col-md-3 mb-3">
					<select name="subject_id" class="form-control">
						<option value="">--- Chọn môn học ---</option>
				      	@foreach($subjects as $subject)
				      		<option value="{{ $subject->id }}">{{ $subject->name }}</option>
				      	@endforeach 
				    </select>
				</div>
				<div class="col-md-2 mb-3">
					<select name="step" class="form-control">
						<option value="">--- Chọn học kì ---</option>
				      	<option value="1">Học kì 1</option>
				      	<option value="2">Học kì 2</option>
				    </select>
				</div>
				<div class="form-group">
			    	<div class="d-flex flex-row-reverse bd-highlight">
					  	<button class="btn btn-success" type="submit">Tìm kiếm</button>
					</div>
			    </div>
			</div>

	    </div>
	    
	</form>
	<a href="{{ route('score.create') }}">Thêm sinh viên</a>
	<table class="table">
		<thead>
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">Sinh viên</th>
			  <th scope="col">Lớp</th>
			  <th scope="col">Học kỳ</th>
			  <th scope="col">Môn học</th>
			  <th scope="col">Điểm miệng</th>
			  <th scope="col">Điểm 15 phút</th>
			  <th scope="col">Điểm 1 tiết</th>
			  <th scope="col">Điểm thi</th>
			  <th scope="col">Điểm TB môn</th>
			  <th scope="col"></th>
			</tr>
		</thead>
	  	<tbody>

			@foreach($items as $key => $item)
				<tr>
					<th scope="row">{{ $key +1 }}</th>
					<td class="text-"><a href="{{ route('score.show', $item->id) }}">{{ $item->student->name }}</a></td>
					<td>{{ $item->lop->name }}</td>
					<td>{{ $item->step = 1 ? 'Học kì 1' : 'Học kì 2' }}</td>
					<td>{{ $item->subject->name }}</td>
					<td>{{ $item->score_mieng }}</td>
					<td>{{ $item->score_15 }}</td>
					<td>{{ $item->score_60 }}</td>
					<td>{{ $item->score_last }}</td>
					<td>{{ $item->getScoreAverage($item->id) }}</td>
					<td>
		                <div class="d-flex">
		                	<div>
		                		<a href="{{ route('score.edit', ['id' => $item->id]) }}">
									<button class="btn"><i class="fa fa-edit"></i></button>
								</a>
		                	</div>
		                	<div>
		                		<form action="{{ route('score.destroy', $item->id)}}" method="post">
				                  @csrf
				                  @method('DELETE')
								  	<button class="btn"><i class="fa fa-trash"></i></button>
				                </form>
		                	</div>
		                </div>
					</td>
				</tr>
			@endforeach
	  	</tbody>
	</table>
	<div class="d-flex flex-row-reverse bd-highlight">
	  	{{ $items->links() }}
	</div>
@endsection