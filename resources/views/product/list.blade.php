<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <h1>Product list</h1>
    <ul>
    @foreach($lipsticks as $item)
        <li>
            <img src="{{$item->image}}" alt="" style="width: 150px">
            {{$item->name}}
            (<a href="/product/edit/{{$item->id}}">Sửa</a>&nbsp;|&nbsp;<a href="/product/{{$item->id}}" class="btn-delete">Xoá</a>)
        </li>
    @endforeach
    </ul>
    <script>

        var listDeleteButton = document.getElementsByClassName('btn-delete');
        for (var i = 0; i < listDeleteButton.length; i++) {
            listDeleteButton[i].onclick = function () {
                if(confirm('Are you sure ?')){
                    var params = '_token={{csrf_token()}}';
                    var currentId = this.id;
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("DELETE", "/product/" + currentId, true);
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            alert('Delete success!');
                            window.location.reload();
                        }
                    };
                    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhttp.send(params);
                }
            }
        }
    </script>
</body>
</html>