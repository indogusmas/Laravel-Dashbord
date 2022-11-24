@extends('layouts.app-2')

@section('title', 'Master Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@section('main')
    <div class="main-content">
        @include('components.response')
        <section class="section">
            <div class="section-header">
                <h1>Detail Product</h1>
            </div>
        </section>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                readonly
                                value="{{$product->name}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input
                                type="text"
                                class="form-control"
                                name="description"
                                id="description"
                                value="{{$product->description}}"
                                readonly
                            />
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-target="#confirmModal"
                            >Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade"
            tabindex="-1"
            role="dialog"
            id="confirmModal">
            <div class="modal-dialog" role="document">
                <form action="{{url('manageproduct',['manageproduct' => $product->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                            <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <p>Are you sure Delete data ?</p>
                        </div>
    
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">Cancel</button>
                            <button type="submit"
                                    class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script type="text/javascript">
        
    </script>
@endpush
