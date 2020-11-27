
@extends('layouts.front')

<div class="space"></div>

@section('content')

<div class="content-wrap well">


   <h3>{{$thread->subject}}</h3>
   <hr>
    <h4>{!! \Michelf\Markdown::defaultTransform($thread->thread) !!} </h4>
   
    <hr>
  <br/>
  
    
    @if(auth()->user()->id == $thread->user_id)
            
    <div class="actions">
       <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>
       
        {{--//delete form--}}
        <form action="{{route('thread.destroy',$thread->id)}}" method="POST" class="inline-it">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-xs btn-danger" type="submit" value="Delete">
        </form>
    </div>
    @endif

    @foreach ($thread->comments as $comment)
   <div class="comment-list well well-lg">
  
  @include('thread.partials.comment-list')
  @include('layouts.partials.footer')
</div>





{{-- reply to comment --}}

{{-- <button class="btn btn-xs btn-default" onclick="toggleReply('{{$comment->id}}')">Reply</button> --}}

<a class="btn btn-info btn-xs" data-toggle="modal" href="#replyForm">Reply To Comment</a>

<div class="modal fade" id="replyForm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       

      </div>
      <div class="modal-body">
        
        
    <div  class="reply-form-{{$comment->id}}">
   
  <form action="{{route('replycomment.store',$comment->id)}}" method="post" role="form">
    {{csrf_field()}}
    <legend>Create Reply</legend>

    <div class="form-group">
      <textarea class="form-control" class="form-control" name="body" id="" placeholder="Reply..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Reply</button>
</form>
 </div>
      </div>
    
    </div>

  </div>

 </div>



 <br/><br/>
    @foreach ($comment->comments as $reply)
        <div class="small well text-info reply-list" style="margin-left: 40px">
          <p>{{$reply->body}}</p>
          <lead>{{$reply->user->name}}</lead>

      <div class="actions">
            {{-- <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a> --}} 
        <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$reply->id}}">Edit Reply</a>
           <div class="modal fade" id="{{$reply->id}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 
  
                </div>
                <div class="modal-body">
                  <div class="comment-form">
     
                    <form action="{{route('comment.update',$reply->id)}}" method="post" role="form">
                      {{csrf_field()}}
                      {{method_field('put')}}
                      <legend>Edit Comment</legend>
                  
                      <div class="form-group">
                      <textarea class="form-control" class="form-control" name="body" id="" placeholder="Input...">{{$reply->body}}</textarea>
                      </div>
                  
                  
                      <button type="submit" class="btn btn-primary">Reply</button>
                  </form>
                  
                   </div>
                </div>
               
              </div>
  
            </div>
  
           </div>
  
  
           
             {{--//delete form--}}
             <form action="{{route('comment.destroy',$reply->id)}}" method="POST" class="inline-it">
                 {{csrf_field()}}
                 {{method_field('DELETE')}}
                 <input class="btn btn-xs btn-danger" type="submit" value="Delete">
             </form>
       </div>

   </div>
    


    @endforeach



    {{-- reply form --}}

    

   @endforeach
 

 <div class="comment-form">
   
  <form action="{{route('threadcomment.store',$thread->id)}}" method="post" role="form">
    {{csrf_field()}}
    <legend>Create Comments</legend>

    <div class="form-group">
      <textarea class="form-control" class="form-control" name="body" id="" placeholder="Input..."></textarea>
    </div>

    

    <button type="submit" class="btn btn-primary">Comment</button>
</form>

 </div>

@endsection


</div>

@section('js')
    
<script>
 
  // function toggleReply(commentId){
  //     $('.reply-form-'+commentId).toggleClass('hidden');
  // }

</script>
@endsection
