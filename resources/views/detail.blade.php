@extends('master')
@section('title', 'Chi tiết sinh viên')
@section('content')
	<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQe2wwf2E2qriq_9LUjOjFyKx9MVC27Sv7Ia7vIuv9zJpVKdw0ROg" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ $score->student->name }}
                    </h5>
                    <h6>
                        {{ $score->student->address }}
                    </h6>
                    @if($score->getScoreAverage($score->id))
                    	<p class="proile-rating">Điểm trung bình  : <span>{{ $score->getScoreAverage($score->id) }}</span></p>
                    @endif
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Điểm số </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tên sinh viên</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $score->student->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ngày sinh</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $score->student->birthday }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Giới tính</label>
                            </div>
                            <div class="col-md-6">
                                @if($score->student->gender == 1)
                                	<p>Nam</p>
                                @else
                                	<p>Nữ</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Địa chỉ</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $score->student->address }}</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Môn</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $score->subject->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Điểm miệng</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $score->score_mieng }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Điểm 15 phút</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $score->score_15 }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Điểm 1 tiết</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $score->score_60 }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Điểm thi</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $score->score_last }}</p>
                            </div>
                        </div>
                        @if($score->getScoreAverage($score->id))
                        <div class="row">
                            <div class="col-md-12">
                                <label>Điểm trung bình</label>
                                <br/>
			                    <p class="proile-rating">Điểm trung bình  : <span>{{ $score->getScoreAverage($score->id) }}</span></p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<style type="text/css">
	.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
@endsection
