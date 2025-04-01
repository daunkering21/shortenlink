<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  Test masuk
  <script>
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          console.log("Latitude:", position.coords.latitude);
          console.log("Longitude:", position.coords.longitude);
          const googleMapsUrl = `https://www.google.com/maps?q=${lat},${lng}`;

          console.log("Google Maps URL:", googleMapsUrl);
          console.log("position: ", position);
        },
        function (error) {
          console.error("Geolocation error:", error.message);
        }
      );
    } else {
      console.error("Geolocation is not supported by this browser.");
    }
  </script>
  
</body>
</html>