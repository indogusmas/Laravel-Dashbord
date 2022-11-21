@extends('layouts.app-2')

@section('title', 'Master Employee')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

<style>
    td {
        min-width: 200px;
        max-width: 200px;
    }
</style>

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Master Employee</h1>
            </div>
            <p class="section-lead">Example Table with Javascript</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Simple Table</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyEmployee">
                                        <tr>
                                            <td>Indo Gusmas</td>
                                            <td>Indo</td>
                                            <td>indo@gmail.com</td>
                                            <td>Detail</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0" id="paginationAjax">
                                    <li class="page-item disabled">
                                        <a class="page-link"
                                            href="#"
                                            tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link"
                                            href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                            href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            fetchDataMaster();
        });

        const fetchDataMaster = (url) => {
            $('#tbodyEmployee').empty();
            $('#paginationAjax').empty();
            var rootUrl = `{{ url('/json/masteremployee?') }}`;
            var link = url ? url :rootUrl;
            sendRequest('GET',link,{},(response)=>{
                if (response != null) {
                    response.data.forEach(item => {
                         $('#tbodyEmployee').append(`
                            <tr>
                                <td>${item.firstname}</td>
                                <td>${item.lastname}</td>
                                <td>${item.email}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                         `);                       
                    });

                    const lastPage      = response.last_page;
                    const currentPage   = response.current_page;
                    const nextPage      = response.next_page_url;
                    const prevPage      = response.prev_page_url;
                    $('#paginationAjax').append(`
                        <li class="page-item">
                            <a class="page-link" ${prevPage == null ? '' : `onclick="fetchDataMaster('${prevPage}')"` }">Previous</a>
                        </li>
                    `);

                    for(let i = currentPage ; i <= currentPage; i++){
                        if (i === currentPage) {
                            $('#paginationAjax').append(`
                                <li class="page-item active">
                                    <a class="page-link">${currentPage}</a>
                                </li>
                            `); 
                        }
                        
                        for (let j = i; j < i+5; j++) {
                                if (j === lastPage) {
                                    break;
                                }

                                $('#paginationAjax').append(`
                                    <li class="page-item">
                                        <a class="page-link" onclick="fetchDataMaster('${rootUrl + `page=${j+1}`}')">${j+1}</a>
                                    </li>
                                `); 
                            }
                    }
                }
            });
        }
    </script>
@endpush
