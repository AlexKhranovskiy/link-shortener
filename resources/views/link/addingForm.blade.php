<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link shortener</title>
    <!-- Styles -->
    <style>
    </style>
</head>
<body>
<form method="post" action="{{route('link.create')}}">
    @csrf
    <label for="inputLink">Enter the link:</label>
    <input id="inputLink" name="link" type="text"/><br/>
    <input value="Create" type="submit">
</form>
</body>
</html>
