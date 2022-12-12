@extends('videos.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>VideoStreaming</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('videos.create') }}"> Create New video</a>
            </div>
        </div>
    </div>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($videos as $video)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $video->title }}</td>
            <td>
                <form action="{{ route('videos.destroy',$video) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('videos.show', $video->id) }}">Play</a>
    
                    <a class="btn btn-primary" href="{{ route('videos.edit', $video->id) }}">Edit</a>
   
                    
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $videos->links() !!}
      
@endsection