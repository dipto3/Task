<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello,</p>

<p>A new product has been created:</p>

<p>Name: {{ $product->name }}</p>
<p>category: {{ $product->category->name }}</p>
<p>Price: {{ $product->price }}</p>

<p>Thank you!</p>
</body>
</html>