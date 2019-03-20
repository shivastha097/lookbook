@if(session('msg'))
    <div class="col-12 alert alert-success my-2">
        {{session('msg')}}
    </div>
@endif