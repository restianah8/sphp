@if ($errors ->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::get('succses'))
<div class="alert alert-primary"  role= "alert">{{Session::get('succses')}}</div>
@endif