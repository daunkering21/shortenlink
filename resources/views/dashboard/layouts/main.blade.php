<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <title>LovIdea Short Link</title>
    <link rel="icon" type="image/x-icon" href="/../root/lovidea.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" >
    <link rel="stylesheet" href="/../assets/css/style.css">
    <link rel="stylesheet" href="/../assets/css/dsstyle.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1"></script>
    @include('dashboard.partial.navbar')
    <div class="wrapper">
        @include('dashboard.partial.sidebar')
        @yield('ds_container')
    </div>
    
    <div class="card text-center mt-auto">
        <div class="card-footer text-body-secondary">
            Copyright© - All rights reserved 2024.
        </div>
    </div>
    @if(session()->has('success'))
    <script>
        Swal.fire({
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @elseif(session()->has('error'))
    <script>
        Swal.fire({
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
    @elseif(session()->has('copy'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let fullMessage = '{{ session('copy') }}';
            let url = fullMessage.replace('Congratulations, your links is ', '');

            Swal.fire({
                text: fullMessage,
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Copy',
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    const tempTextarea = document.createElement('textarea');
                    tempTextarea.value = url;
                    document.body.appendChild(tempTextarea);
                    tempTextarea.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempTextarea);

                    Swal.fire({
                        text: 'Link copied to clipboard!',
                        icon: 'success'
                    });
                }
            });
        });
    </script>
    @endif
    <script src="/../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>