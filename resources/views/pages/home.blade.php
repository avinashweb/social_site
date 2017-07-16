@extends('layout.master')
@section('content')
<div class="row">
  <div class="col-sm-3 well">
    <div class="well">
      <p><a href="#">My Profile</a></p>
      <img src="img/{{Auth::user()->imp_path}}" class="img-circle" height="95" width="95" alt="Avatar">
    </div>
    <div class="well">
      <p><a href="#">Interests</a></p>
      <p>
        <span class="label label-default">News</span>
        <span class="label label-primary">W3Schools</span>
        <span class="label label-success">Labels</span>
        <span class="label label-info">Football</span>
        <span class="label label-warning">Gaming</span>
        <span class="label label-danger">Friends</span>
      </p>
    </div>
    <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <p><strong>Ey!</strong></p>
      People are looking at your profile. Find out who.
    </div>
    <p><a href="#">Link</a></p>
    <p><a href="#">Link</a></p>
    <p><a href="#">Link</a></p>
  </div>
  <div class="col-sm-7">
  
    <div class="row">
      <div class="col-sm-12">
        <form action="{{ route('post') }}" method="post">
          {{csrf_field()}}
          <div class="form-group comment-div">
            <textarea name="content" id="content" class="form-control" placeholder="Share an Update, {{ Auth::user()->name}}"></textarea>
          </div>
          <div class="form-group clearfix">
            <input type="submit" value="Share" class="btn btn-primary pull-right">
          </div>
        </form>
      </div>
    </div>
    @foreach($posts as $post)
    <div class="row">
      <div class="col-sm-3">
        <div class="well">
         <p>{{ $post->user->name}}</p>
         <img src="img/{{$post->user->imp_path}}" class="img-circle" height="55" width="55" alt="Avatar">
        </div>
      </div>
      <div class="col-sm-9">
        <div class="well-comment" data-postid="{{ $post->id }}">
          <p>{{ $post->content }}</p>
          <div class="clearfix">
            <span class="like"><a id="like-btn_{{ $post->id }}" onclick="like_btn({{ $post->id }})">Like</a>
            @if(Auth::user() == $post->user)
              &nbsp;|&nbsp;<a id="editbtn">Edit</a>&nbsp;|&nbsp;<a href="{{route('delete', ['id' => $post->id])}}">Delete</a>
            @endif
            </span>
            <span class="pull-right author">Posted on: {{$post->created_at->diffForHumans() }}</span>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="col-sm-2 well">
    <div class="thumbnail">
      <p>Upcoming Events:</p>
      <img src="img/user_image.jpg" alt="Paris" width="400" height="300">
      <p><strong>Paris</strong></p>
      <p>Fri. 27 November 2015</p>
      <button class="btn btn-primary">Info</button>
    </div>      
    <div class="well">
      <p>ADS</p>
    </div>
    <div class="well">
      <p>ADS</p>
    </div>
  </div>
</div>
<!-- Model Section -->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
          <textarea name="content" id="edit-content" class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save-change">Save changes</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
var user_id = '{{ Auth::user()->id }}';
var like_url = '{{ route("like") }}';
var url = '{{ route("edit") }}';
var token = '{{ csrf_token() }}';
</script>
@endsection