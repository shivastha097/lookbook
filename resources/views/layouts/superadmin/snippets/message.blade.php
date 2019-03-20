@if(session('msg'))
    <div class="col-12 mt-2 alert alert-success">
        {{session('msg')}}
    </div>
@endif