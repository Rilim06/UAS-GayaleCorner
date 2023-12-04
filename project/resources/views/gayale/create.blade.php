<h1>Add new products</h1>
@if($errors)
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<form action="/gayale" method="post" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name" /><br />
    Description: <textarea name="description"></textarea><br />
    Category: <br />
    <label><input type="radio" name="category" value="foods"> Foods</label><br>
    <label><input type="radio" name="category" value="beverages"> Beverages</label><br>
    <label><input type="radio" name="category" value="clothes"> Clothes</label><br>
    <label><input type="radio" name="category" value="accessories"> Accessories</label><br>
    <label><input type="radio" name="category" value="others"> Others</label><br>
    Price: <input type="text" name="price" /><br />
    Stock: <input type="text" name="stock" /><br />
    Photo: <input type="file" name="photo" /><br />
    <button type="submit">Submit</button>
</form>