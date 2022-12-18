<!DOCTYPE html>
<html>
<head>
    <title>Tugas Kelompok 2 Grading System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
       
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
    
<div class="container">
    @yield('content')
</div>
<script>
    function grade(){
        var quiz = document.getElementById("quiz").value;
        var tugas = document.getElementById("tugas").value;  
        var absensi = document.getElementById("absensi").value; 
        var praktek = document.getElementById("praktek").value; 
        var uas = document.getElementById("uas").value; 
        var result = parseInt(quiz) + parseInt(tugas) + parseInt(absensi) + parseInt(praktek) + parseInt(uas);
        var result = parseInt(result/5);
        var grade = "";
        if(result <= 65){
            grade = "D";
        }else if(result <= 75){
            grade = "C";
        }else if(result <= 85){
            grade = "B";
        }else if(result <= 100){
            grade = "A";
        }
        document.getElementById('grade').value = grade;
        document.getElementById('submitdata').disabled = false;
    }
</script>
</body>
</html>