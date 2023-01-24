<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="/">E-Commerce</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shop">Shop</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/my-orders">My Orders</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/cart">Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php
                                use App\Models\Category;
                                $categories = Category::all();
                                foreach ($categories as $category) {
                                    ?>
                            <a class="dropdown-item"
                                href="/category?id={{ $category['id'] }}">{{ $category['category_name'] }}</a>
                            <?php } ?>
                        </div>
                        {{-- </div> --}}

                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0 custom-navbar-form" action="/search-products" method="GET">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                    <button class="btn btn-outline-Primar my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="dropdown show ml-2 mr-2">
                    <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown">Account</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="signup">Signup</a>
                        <a class="dropdown-item" href="signin">Signin</a>
                        <a class="dropdown-item" href="logout">Logout</a>
                    </div>
                </div>

            </div>
        </nav>
    </nav>
</body>

</html>
