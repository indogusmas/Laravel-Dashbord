@extends('layouts.app-2')

@section('title', 'Master Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Data Product</h1>
            </div>
        </section>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <form action="{{route('manageproduct.store')}}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                 <div class="form-group">
                                     <label for="name">Name</label>
                                     <input class="form-control" type="text" id="name" name="name" min="10" maxlength="20">
                                 </div>
     
                                 <div class="form-group">
                                     <label for="description">Description</label>
                                     <input type="text" class="form-control" id="description" name="description" maxlength="200">
                                 </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- Page Specific JS File -->
    <script type="text/javascript">

    </script>
@endpush
