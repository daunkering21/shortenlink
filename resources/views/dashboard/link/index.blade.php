@extends('dashboard.layouts.main')
@section('ds_container')
<div class="container-fluid min-vh-100 blbg">
    <div class="container mt-3">
        <div class="col-lg">
            <div class="card d-flex">
                <div class="card-header text-center bg-gray-100">
                    <span class="text-purple bold">Shorten Link</span>
                </div>
                <div class="card-body text-center">
                    <form action="/short" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="url" class="form-label"><span class="text-secondary bold">Target URL</span></label>
                            <input type="text" class="form-control text-center bg-grey-10" id="url" name="url" placeholder='" Put your target URL here "' value="{{ old('url') }}">
                        </div>
                        <div class="mb-3">
                            <label for="custom_url" class="form-label"><span class="text-secondary bold">Your Custom URL</span></label>
                            <input type="text" class="form-control text-center bg-grey-10" id="custom_url" name="custom_url" placeholder='" www.lovilink.com/ Your URL Here "' value="{{ old('custom_url') }}">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label"><span class="text-secondary bold">Title</span></label>
                            <input type="text" class="form-control text-center bg-grey-10" id="title" name="title" placeholder='" Title for URL "' value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><span class="text-secondary bold">Description</span></label>
                            <textarea class="form-control text-center bg-grey-10" id="description" name="description" placeholder='" Put you description here to describe your url "'>{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning"><span class="text-purple bold">Shorten Your Links!</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="table-responsive">

            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Links</th>
                        <th>Shortened Links</th>
                        <th></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $currentPage = $data->currentPage();
                        $perPage = $data->perPage();
                        $startNumber = ($currentPage - 1) * $perPage + 1;
                    @endphp
                    <form id="searchForm" action="/dashboard/link/{{ $username }}" method="GET" >
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" class="form-control text-center bg-grey-10" id="original_url" name="original_url" placeholder='link search' value="{{ request('original_url') }}">
                            </td>
                            <td>
                                <input type="text" class="form-control text-center bg-grey-10" id="custom_url" name="custom_url" placeholder='link search' value="{{ request('custom_url') }}">
                            </td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-warning">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </span>
                                    Search
                                </button>
                            </td>
                        </tr>
                    </form>
                    @foreach($data as $index => $d)
                    <tr>
                        <td>{{ $index + $startNumber }}</td>
                        <td>
                            <span class="text-truncate">{{ $d['original_url'] }}</span>
                        </td>
                        <td id="copy_url_{{ $d['custom_url'] }}">{{ env('DOMAIN') }}{{ $d['custom_url'] }}</td>
                        <td class="justify-content-center align-items-center">
                            <button id="url_{{ $d['custom_url'] }}" type="button" onclick="copyToClipboard('{{ $d['custom_url'] }}')" class="btn btn-outline-purple">Copy</button>
                        </td>
                        <td class="d-flex gap-2">
                            <a href="/dashboard/link/{{ $username }}/{{ $d['custom_url'] }}/edit" class="btn btn-success">Edit</a>
                            <form id="deleteForm" action="/dashboard/link/{{ $username }}/{{ $d['custom_url'] }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="button" onclick="confirmDelete()" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
      
</div>
@foreach([
    'original_url',
    'custom_url',
    'title',
    'description',
] as $kalauError)
    @error($kalauError)
        <script>
            Swal.fire([
                text: '{{ $message }}',
                icon: 'error',
                confirmButtonText: 'OK',
            ]);
        </script>
    @enderror
@endforeach
<script>
    function copyToClipboard(customUrl) {
        // Periksa apakah elemen dengan ID yang diberikan ada
        var copyElement = document.getElementById('copy_url_' + customUrl);
        if (!copyElement) {
            console.error('Element with ID copy_url_' + customUrl + ' not found.');
            return;
        }
    
        // Ambil teks dari elemen
        var copyText = copyElement.textContent;
    
        // Buat elemen input sementara
        var tempInput = document.createElement('input');
        tempInput.value = copyText;
        document.body.appendChild(tempInput);
    
        // Pilih dan salin teks dari elemen input sementara
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // Untuk perangkat mobile
        document.execCommand('copy');
    
        // Hapus elemen input sementara
        document.body.removeChild(tempInput);
    
        // Tampilkan notifikasi sukses menggunakan SweetAlert
        Swal.fire({
            text: 'URL copied to clipboard: ' + copyText,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }
    function confirmDelete() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to delete this URL?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }

    document.getElementById('searchForm').addEventListener('submit', function(event) {
        const inputs = [
            'original_url',
            'custom_url'
        ];
        inputs.forEach(id => {
            const inputElement = document.getElementById(id);
            if (!inputElement.value) {
                inputElement.disabled = true; // Disable input if it's empty
            } else {
                inputElement.disabled = false; // Ensure input is enabled if it's not empty
            }
        });
    });


</script>  
@endsection