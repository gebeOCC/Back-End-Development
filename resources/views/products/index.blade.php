<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
<h1>Products list</h1>
<form method="post" action="{{route('product.store')}}">
        @csrf
        @method('post')
        <div class="form">
            <input type="text" name="name" placeholder="Name">
            <input type="number" name="qty"placeholder="Qty">
            <input type="number" name="price" step="any" placeholder="Price">
            <input type="text" name="description" placeholder="Description">
            <button class="submitbtn" type="submit" >Add product</button>
        </div>
    </form>

    @if(session()->has('success'))
    <div>
        {{session('success')}}
    </div>
    @endif
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
                <div class="action">
                    <a href="{{route('product.edit', ['product' => $product ])}}">
                        
                        <button class="btnaction">Edit</button>
                    </a>
                            <form method="post" action="{{route('product.delete', ['product' => $product])}}">
                                @csrf
                                @method('delete')
                                <button class="btnaction" type="submit">Delete</button>
                            </form>
                        </div>
                    
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>