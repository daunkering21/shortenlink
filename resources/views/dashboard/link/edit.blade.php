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
                    <form action="/dashboard/link/{{ $username }}/{{ $data['custom_url'] }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="url" class="form-label"><span class="text-secondary bold">Target URL</span></label>
                            <input type="text" class="form-control text-center bg-grey-10" id="url" name="url" placeholder='" Put your target URL here "' value="{{ $data['original_url'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="custom_url" class="form-label"><span class="text-secondary bold">Your Custom URL</span></label>
                            <input type="text" class="form-control text-center bg-grey-10" id="custom_url" name="custom_url" placeholder='" www.lovilink.com/ Your URL Here "' value="{{ $data['custom_url'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label"><span class="text-secondary bold">Title</span></label>
                            <input type="text" class="form-control text-center bg-grey-10" id="title" name="title" placeholder='" Title for URL "' value="{{ $data['title'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><span class="text-secondary bold">Description</span></label>
                            <textarea class="form-control text-center bg-grey-10" id="description" name="description" placeholder='" Put you description here to describe your url "'>{{ $data['description'] }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success"><span class="text-white bold">Update</span></button>
                        <a href="/dashboard/link/{{ $username }}" class="btn btn-warning"><span class="text-purple bold">Back</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection