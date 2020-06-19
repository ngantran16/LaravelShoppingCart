<html lang="en">
    <head>
    <title>Shopping cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
        <div class= "container">
            <div class = "shopping_cart">
                <a href="/products">Tiếp tục mua hàng</a>
                <h1 style="margin-left:50px;">Giỏ hàng</h1>
                <br>
                <div style = "background-color:#ECECEC; margin-left:50px;">
                    <?php $total = 0 ?>
                <table class="table" >
                <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td><img src='{{'/storage/'.$cart->image }}' alt="" style="width:150px; height:100px;"></td>
                            <td>{{ $cart->name}}</td>
                            <td>{{ $cart->price}}</td>
                            <td><input type="number" value="{{ $cart->quantity }}" style="width:60px;" name = "quantity"></td>
                            <td>{{ $cart->price * $cart->quantity}}</td>
                            <?php $total += $cart->price * $cart->quantity ?>
                            <td>
                            <form action="/cart/{{ $cart->id }}" method="post">
                                @csrf
                                @method("DELETE")
                                    <button class = "btn btn-danger" type="submit">Xóa</button>
                            </form>
                            </td>
                            <td>
                                <form action="/cart/update/{{ $cart->id }}" method="post">
                                    @csrf
                                        <button class = "btn btn-link" type="submit">Cập nhật</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
            </div>
            </table>
            <div style="margin-left:80px;">
                <h3 style = "position:relative; left:630px;">Cộng giỏ hàng</h3>
                        <table class="table table-bordered" style = "width:500px; position:relative; left:530px;">
                        <thead>
                        <tr>
                            <th>
                                <div class = "col-sm-6">Tạm tính:</div>
                                <div class = "col-sm-6"> <?php echo $total ?></div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <th>
                            <div class = "col-sm-6">Tổng:</div>
                            <div class = "col-sm-6"><?php echo $total ?></div>
                        </th>
                        </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-warning" style="margin-left:875px;">Tiến hành thanh toán</button>
            </div>
            </div>
        </div>
</body>
</html>
