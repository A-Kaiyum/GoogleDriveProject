<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Drive Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

    <h2 class="text-center mt-5"> <span style="font-size:48px">
        &#128512;
        </span>Google Drive Integration <span style="font-size:48px">
        &#128512;
        </span></h2>

    <div class="container">
        <div class="text-center mt-3">
            @if (session()->has('message'))
            <span class="text-center alert alert-success" role="alert">
               {{ session('message') }}
            </span>

        @endif
         </div>
        <form  method="POST" action="{{url('upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title"
                    placeholder="Enter First Name" name="title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description"
                    placeholder="Enter Last Name" name="description">
            </div>
            <div class="form-group">
                <label for="file">Upload File</label>
                <input type="file" class="form-control" id="uploaded_file"
                    placeholder="upload file" name="file">
            </div>
            <div class="text-center">
            <button type="submit" class="btn bg-success">
                Submit
            </button>
        </div>

        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
