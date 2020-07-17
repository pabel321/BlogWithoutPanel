@extends('welcome')

@section('content')
<div class="container">
      <div class="col-lg-8 col-md-10 mx-auto">
          <a href="{{route('allPost')}}" class="btn btn-info">All Post</a>
        <hr>
        <form action="{{url('updatePost/'.$post->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" value="{{$post->title}}" name="title" required >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control" name="category_id">

                @foreach($category as $row)
                <option value="{{$row->id}}" <?php if($row->id == $post->category_id) echo "selected"; ?> >{{$row->name}}</option>
                @endforeach

              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 ">
              <label>New Image</label>
              <input type="file" class="form-control" name="image"><br>
              Old Image: <img src="{{URL::to($post->image)}}" style="height: 40px; width: 80px;">
              <input type="hidden" name="old_photo" value="{{$post->image}}">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control"  required name="details" >{{$post->details}}</textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
        </form>
      </div>
    </div>
@endsection