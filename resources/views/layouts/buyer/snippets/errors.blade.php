@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="col-12 alert alert-danger">
            <li>{{$error}}</li>
        </div>
    @endforeach
@endif