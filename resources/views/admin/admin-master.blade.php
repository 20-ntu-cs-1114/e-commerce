<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css.pphadmincss.css">
    <style>
        .custom-signup-container{
            height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .custom-signup-container form{
            width: 100%;
            max-width: 400px;
        }
        .nav{
            float: left;
            width: 100px;
            background-color: rgb(48, 48, 48);
            min-height: 100vh;
        }
        .nav ul{
            width: 100%;
            list-style: none;
            padding: 20px 10px;
        }
        .nav ul li{
            padding: 10px;
            background-color: rgb(48, 48, 48);
        }
        .nav ul li:hover{
            background-color: rgb(99, 99, 99);
        }
        .nav ul li a{
            color: white;
            text-decoration: none;
        }
        .carousel-item > img{
            object-fit: cover;
            /* height: 100%; */
            /* width: 100%; */
        }
        .carousel {
    height: 500px; /* Adjust this value to change the height of the carousel */
}

    </style>
</head>
<body>
     {{-- {{view('header')}} --}}
    {{view('admin.admin-header')}}
    @yield('admin-section')
     {{-- {{view('footer')}}   --}}

     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
