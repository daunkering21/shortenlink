<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Protected Link</title>
</head>
<body>
  <div class="container">
    <form action="/validate-password" method="POST" style="text-align:center;margin-top:50px;">
      <h2>Protected Link</h2>
      @csrf
      <input type="hidden" name="url" value="{{ $url }}">
      <label for="password">Enter Password:</label><br>
      <input type="password" id="password" name="password"><br><br>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>