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
  {{ $ip }}
  <script>
    const ip = "{{ $ip }}"; // Ambil dari Blade
  
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
  
        const geolocation = `https://www.google.com/maps?q=${latitude},${longitude}`;
  
        fetch("/api/send-location", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ geolocation, ip }),
        })
        .then(response => {
          if (response.ok) {
            window.location.href = "/";
          } else {
            console.error("Failed to send location.");
          }
        })
        .catch(error => {
          console.error("Error:", error);
        });
      });
    } else {
      console.error("Geolocation is not supported by this browser.");
    }
  </script>
  
  
</body>
</html>