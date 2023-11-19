<style>
    .photo{
        width: 100px;
    }
</style>
<h1>Edit Product</h1>
<form action="/gayale/{{$product->id}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    Name: <input type="text" name="name" value="{{$product->name}}" /><br />
    Description: <textarea name="description">{{$product->description}}</textarea><br />
    Price: <input type="text" name="price" value="{{$product->price}}" /><br />
    Stock: <input type="text" name="stock" value="{{$product->stock}}" /><br />
    Current Photo: <img class="photo" src="{{asset($photo)}}" /><br />
    Photo: <input type="file" name="newPhoto" /><br />
    <button type="submit">Submit</button>
</form>