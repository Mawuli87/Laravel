@extends('layouts.front')
<div class="space"></div>

    <div class="col-md-3" >
    {{-- <div class="dp">
    <img src="https://dummyimage.com/300x200/000/fff" alt="">
    </div> --}}
      

    </div>



@section('content')
@include('layouts.partials.footer')
<div>
    
    <h3>{{$user->name}}'s latest Threads</h3>

    @forelse($threads as $thread)
        <h3>{{$thread->subject}}</h3>

    @empty
        <h5>No threads yet</h5>

    @endforelse
    <br>
    <hr>

    {{-- <h3>{{$user->name}}'s latest Comments</h3>

    @forelse($comments as $comment)
        <h5>{{$user->name}} commented on <a href="{{route('thread.show',$comment->commentable->id)}}">{{$comment->commentable->subject}}</a>{{$comment->created_at->diffForHumans()}}</h5>
    @empty
    <h5>No comments yet</h5>
    @endforelse --}}

   

    <div class="list-group">
        @forelse ($threads as $thread)
    
      <a href="{{route('thread.show',$thread->id)}}" class="list-group-item">
         <h4 class="list-group-item-heading">{{$thread->subject}}</h4>
         <p class="list-group-item-text">{{str_limit($thread->thread,100)}}</p>
        </a>
         @empty
         <h4>No threads</h4>
      @endforelse
    
    </div>




@endsection