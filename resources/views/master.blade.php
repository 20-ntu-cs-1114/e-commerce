<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <title>Document</title>
    <style>
        .custom-signup-container {
            height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-signup-container form {
            width: 100%;
            max-width: 400px;
        }

        .carousel-item img {
            object-fit: cover;
            height: 500px;
            width: 100%;
        }
        .carousel-inner{
            height: 100%;
        }
        .carousel {
            height: 500px;
            margin-bottom: 100px;
            /* Adjust this value to change the height of the carousel */
        }
        .container-fluid{
            padding: 0px;
        }
        .custom-card{
            /* min-height: 250px; */
            /* max-height: 500px; */
            height: 300px;
        }
        .card-img-top{
            height: 60%;
            object-fit: cover;
        }
        .card-body{
            height: 40%;
        }
        .wrapper{
            /* padding-top: 10px; */
            margin-top: 70px;
            margin-bottom: 70px;
        }
        .shoe-wrapper h2{
            margin-bottom: 50px;
        }
        .single-product-image{
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        .single-product-detail-container{
            max-height: 500px;
        }
        .single-product-detail{
            height: 80%;
            overflow: hidden;
            text-overflow:ellipsis;
        }
        .single-product-buttons{
            height: 20%;
        }
    </style>
</head>

<body>
    {{ view('header') }}
    @yield('section')

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
