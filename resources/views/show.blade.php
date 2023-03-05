<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Drive Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body class="bg-dark">

    <h2 class="text-center mt-5 text-warning"> <span style="font-size:48px">
        &#128512;
        </span>Google Drive Integration <span style="font-size:48px">
        &#128512;
        </span></h2>

    <div class="container">

       {{-- <img src="{{$file}}" alt=""> --}}
       <div class="text-center">
        <iframe width="600" height="400" src="{{$url}}">
        </iframe>

       </div>
       <div class="text-center">
        <button class="btn bg-danger">
            <a href="{{route('delete.file',$id)}}" class="text-decoration-none text-light">Delete File</a>
        </button>
        <button class="btn bg-warning">
            <a href="{{route('download.file',$id)}}" class="text-decoration-none text-light">Download File</a>
        </button>
       </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
