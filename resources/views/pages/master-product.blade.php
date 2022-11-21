@extends('layouts.app-2')

@section('title', 'Dashboard')

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
        <section class="section">
            <div class="section-header">
                <h1>Master Product</h1>
            </div>
        </section>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Advanced Table</h4>
                        <div class="card-header-form">
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
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table-striped table" id="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyProduct">
                                    <tr>
                                        <td>Create a mobile app</td>
                                        <td class="align-middle">
                                            <div class="progress"
                                                data-height="4"
                                                data-toggle="tooltip"
                                                title="100%">
                                                <div class="progress-bar bg-success"
                                                    data-width="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image"
                                                src="{{ asset('img/avatar/avatar-5.png') }}"
                                                class="rounded-circle"
                                                width="35"
                                                data-toggle="tooltip"
                                                title="Wildan Ahdian">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
       $(document).ready(function() {
            setData(mockDataProduct);
       });

       const mockDataProduct = [
        {
            product     : "Kemeja Panel 12",
            price       : 250000,
            quantity    : 100
        },
        {
            product     : "Kemeja Panel 13",
            price       : 300000,
            quantity    : 200
        }
       ];

       const setData = (listData) => {
        $('#tbodyProduct').empty();
        listData.forEach(data => {
            $('#tbodyProduct').append(`
                <tr>
                    <td>${data.product}</td>
                    <td class="align-middle">${data.price}</td>
                    <td>${data.quantity}</td>
                </tr>
            `);
        });
       };

    </script>
@endpush
