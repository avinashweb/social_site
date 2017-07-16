@extends('layout.master')
@section('content')
<div class="row">

  <div class="col-md-3">
    <div class="div-img">
      <img src="{{ URL::to('/img/'.$user_data->imp_path)}}" alt="">
    </div>
    <h2>{{ $user_data->name }}'s Profile</h2>
  </div>
  <div class="col-md-9">
    <h3>Change Image</h3>
    <form action="{{ route('profile-image') }}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <input type="file" name="imp_path" id="imp_path" class="form-control">
      </div>
      <div class="form-group clearfix">
        <input type="submit" value="Change Image" class="btn btn-primary pull-right">
      </div>
    </form>
  </div>
</div>

@endsection