<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div>姓名 : {{$name}}</div>
    <div>信箱 : {{$mail}}</div>
    <div>電話 : {{$tel}}</div>
    <div>主旨 : {{$title}}</div>
    <div>內文 : {{$content}}</div>

    <table class="table-dark">
        <thead>
            <tr>
                <th scope="col">{{$name}}</th>
                <th scope="col">{{$mail}}</th>
                <th scope="col">{{$tel}}</th>
                <th scope="col">{{$title}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$name}}</th>
                <td>{{$mail}}</td>
                <td>{{$tel}}</td>
                <td>{{$title}}</td>
            </tr>
            <tr>
                <th scope="row">{{$name}}</th>
                <td>{{$mail}}</td>
                <td>{{$tel}}</td>
                <td>{{$title}}</td>
            </tr>
            <tr>
                <th scope="row">{{$name}}</th>
                <td>{{$mail}}</td>
                <td>{{$tel}}</td>
                <td>{{$title}}</td>
            </tr>
        </tbody>
    </table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

</body>

</html>
