<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('product.update', ['product' => $product])}}">
        @csrf 
        @method('put')
        <div class="form">   
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}" />
            <input type="text" name="qty" placeholder="Qty" value="{{$product->qty}}" />
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}" />
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}" />
            <button class="submitbtn" type="submit">Update</button>
        </div>
    </form>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="{{route('product.edit', ['product' => $product ])}}"><button class="btnaction">Edit</button></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>