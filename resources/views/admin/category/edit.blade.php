<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Category form</h1>
    <form action="/admin/category/{{$obj->id}}" method="post">
        @method('PUT')
        {{csrf_field()}}
        Name : <input type="text" name="name" value="{{$obj->name}}"><br>
        Des : <input type="text" name="description" value="{{$obj->description}}"><br>
        Image : <input type="text" name="image" value="{{$obj->image}}"><br>
        <img src="{{$obj->image}}" alt="" style="width: 300px;"><br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>