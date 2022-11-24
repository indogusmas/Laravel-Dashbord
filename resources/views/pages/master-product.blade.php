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
                <h1>Master Product</h1>
            </div>
            <p class="section-lead">Example Table with Paginate Laravel Bootstrap</p>
        </section>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Advanced Table</h4>
                        {{-- <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control"
                                        placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                        <div class="card-header-form">
                            <a href="{{route('manageproduct/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table-striped table" id="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyProduct">
                                    @forelse ($products as $item)
                                        <tr>
                                            <td colspan="1">{{ $item->name }}</td>
                                            <td colspan="1">{{ $item->description }}</td>
                                            <td colspan="2">
                                                <a class="btn-sm btn-primary m-1" href="{{ url('manageproduct',['manageproduct' => $item->id]) }}">Detail</a>
                                                <a class="btn-sm btn-danger m1" href="#">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            Data empty
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    {{$products->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
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
