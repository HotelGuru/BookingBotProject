<!-- incase of multiple errors -->
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<!-- incase of success -->
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<!-- incase of just one error -->
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif