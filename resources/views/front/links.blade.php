@extends('layouts.main')
@section('container')
<div class="container-fluid min-vh-100 blbg">
    <div class="table-responsive p-4">
        <table class="table blbg">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>Links</th>
                    <th>Shortened Links</th>
                    <th></th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $currentPage = $data->currentPage();
                    $perPage = $data->perPage();
                    $startNumber = ($currentPage - 1) * $perPage + 1;
                @endphp
                @foreach($data as $index => $d)
                <tr>
                    <td>{{ $index + $startNumber }}</td>
                    <td>
                        <span class="text-truncate">{{ $d['original_url'] }}</span>
                    </td>
                    <td id="copy_url_{{ $d['custom_url'] }}">{{ env('DOMAIN') }}{{ $d['custom_url'] }}</td>
                    <td>
                        <button id="url_{{ $d['custom_url'] }}" type="button" onclick="copyToClipboard('{{ $d['custom_url'] }}')" class="btn btn-outline-purple">Copy URL</button>
                    </td>                
                    <td>{{ $d['created_at'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
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
</script>    
@endsection