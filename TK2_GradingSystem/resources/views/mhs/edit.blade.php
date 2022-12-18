@extends('mhs.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('grade.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('grade.update',$grade->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$grade->nama}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nim:</strong>
                <input type="text" name="nim" class="form-control" placeholder="nim" value="{{$grade->nim}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>jurusan:</strong>
                <input type="text" class="form-control" name="jurusan" placeholder="jurusan" value="{{$grade->jurusan}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Quiz:</strong>
                <input id="quiz" type="number" min="0" max="100" class="form-control" name="quis" placeholder="0" value="{{$grade->quis}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Tugas:</strong>
                <input id="tugas" type="number" min="0" max="100" class="form-control" name="tugas" placeholder="0" value="{{$grade->tugas}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Absensi:</strong>
                <input id="absensi" type="number" min="0" max="100" class="form-control" name="absensi" placeholder="0" value="{{$grade->absensi}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Praktek:</strong>
                <input id="praktek" type="number" min="0" max="100" class="form-control" name="praktek" placeholder="0" value="{{$grade->praktek}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Uas:</strong>
                <input id="uas" type="number" min="0" max="100" class="form-control" name="uas" placeholder="0" value="{{$grade->uas}}">
            </div>
        </div>
        <input id="grade" type="hidden" name="grade" value="{{$grade->grade}}">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button id="submitdata" type="submit" class="btn btn-primary" disabled>Submit</button>
                <a class="btn btn-secondary" onclick="grade()">Check</a>
            </div>
        </div>
   
    </form>
@endsection