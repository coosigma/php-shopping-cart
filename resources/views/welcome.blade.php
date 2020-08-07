<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopping Cart Demo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <h2> Products </h2>
        <div class="products">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                    <tr>
                        <td>{{$product['name']}}</td>
                        <td align="right">{{$product['price']}}</td>
                        <td><a href="/add/{{$index}}">Add to Cart</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex-center position-ref full-height">
            <h2> Cart </h2>
            <div class="products">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart['cartInfo'] as $product)
                        <tr>
                            <td>{{$product['name']}}</td>
                            <td align="right">{{$product['price']}}</td>
                            <td align="center">{{$product['quantity']}}</td>
                            <td align="right">{{$product['total']}}</td>
                            <td><a href="/remove/{{$product['id']}}">Remove from Cart</a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan=2></td>
                            <td align="right">Product Totals: </td>
                            <td align="right">{{$cart['subtotal']}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>