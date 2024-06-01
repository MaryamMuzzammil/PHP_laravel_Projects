<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   
                <h3 class="text-primary">Edit New Blogs</h3>
               
                <form action="{{route('addblog')}}"  method="post"  enctype="multipart/form-data">
                    @csrf
                         <div class="mb-3">
                            <label class="form-label">Blog Tittle:</label>
                            <input type="text" name="title" class="form-control">
                         </div>
                         <div class="mb-3">
                            <label class="form-label">Blog Content:</label>
                            <input type="text" name="content" class="form-control">
                         </div>
                         <div class="mb-3">
                            <label class="form-label">Date Of posting:</label>
                            <input type="date" name="date" class="form-control">
                         </div>
                        
                         <label for="">select image:</label>
                    <input type="file" name="image" id=""><br><br>
                         
                         <button type="submit" class="btn btn-primary">Add</button>
                    </form>
          
</body>
</html>