@php
   $response = session('msg');
@endphp

@if (!empty($response))
    <div class="alert alert-{{$response['code']}} alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>&times;</span></button>
            {!! $response['msg'] !!}
        </div>
    </div>
@endif

@php
    session()->forget('msg');
@endphp