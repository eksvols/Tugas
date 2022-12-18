@extends('mhs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tugas TK2 Grading System</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('grade.create') }}"> Tambah Data</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Nim</th>
            <th>Jurusan</th>
            <th>Grade</th>
            <th width="280px">Action</th>
        </tr>
        <script>var data = [];</script>
        @foreach ($Grades as $Grade)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $Grade->nama }}</td>
            <td>{{ $Grade->nim }}</td>
            <td>{{ $Grade->jurusan }}</td>
            <td>{{ $Grade->grade }}</td>
            <script>data.push("{{$Grade->grade}}");</script>
            <td>
                <form action="{{ route('grade.destroy',$Grade->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('grade.show',$Grade->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('grade.edit',$Grade->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <canvas id="bar-chart"></canvas>
    <script>
        counts = {};
  data.forEach(function (x) { counts[x] = (counts[x] || 0) + 1; });
  const ctx = document.getElementById('bar-chart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Grade A', 'Grade B', 'Grade C', 'Grade D'],
      datasets: [{
        label: 'Grading System Chart',
        data: [counts['A'], counts['B'], counts['C'], counts['D']],
        backgroundColor: ["green", "blue", "yellow", "red"],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  
</script>
    {!! $Grades->links() !!}
      
@endsection