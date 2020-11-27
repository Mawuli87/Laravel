<h4>{{$comment->body}}</h4>
@if(!empty($thread->solution))
 
    @if($thread->solution == $comment->id)
        <button style="margin-top: 20px;" class="btn btn-success pull-right">Solution</button>
    @endif
@else

   @if(auth()->check())
        @if(auth()->user()->id == $thread->user_id)
       {{-- <form action="{{route('markAsSolution')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="threadId" value="{{$thread->id}}">
        <input type="hidden" name="solutionId" value="{{$comment->id}}">
       <input type="submit" class="btn btn-success pull-right" id="{{$comment->id}}" value="Mark As Solution">
    </form>  --}}
   
    <div style="margin-top: 20px;" class="btn btn-success pull-right" onclick="markAsSolution('{{$thread->id}}','{{$comment->id}}',this)">Mark as solution</div>
   
   @endif
 @endif 
  
 @endif       

<lead>{{$comment->user->name}}</lead>
 <br/>

<div class="actions">

   {{-- <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a> --}} 
<a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$comment->id}}">Edit Comment</a>
  <div class="modal fade" id="{{$comment->id}}">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        

       </div>
       <div class="modal-body">
         <div class="comment-form">

           <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
             {{csrf_field()}}
             {{method_field('put')}}
             <legend>Edit Comment</legend>
         
             <div class="form-group">
               <textarea class="form-control" name="body" id="" placeholder="Input..."> {{$comment->body}}</textarea>
             
             </div>
         
         
             <button type="submit" class="btn btn-primary">Save Comment</button>
         </form>
         
          </div>
       </div>
     
     </div>

   </div>

  </div>


  
    {{--//delete form--}}
    <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input class="btn btn-xs btn-danger" type="submit" value="Delete">
    </form>
    <span style="margin-left: 20px;" class="btn btn-default btn-xs {{$comment->isLiked()?"liked":""}}" onclick="likeIt('{{$comment->id}}',this)" ><span class="glyphicon glyphicon-heart"></span></span>
    <button class="btn btn-default btn-xs pull-right" style="margin-right: 15px;color:#000000;font-weight:bolder;font-size:20px;" id="{{$comment->id}}-count" >{{$comment->likes()->count()}}</button>
 
</div>

<script>

          function markAsSolution(threadId, solutionId,elem) {
            var csrfToken='{{csrf_token()}}';
            $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
                $(elem).text('Solution');
            });
        }

        function likeIt(commentId,elem){
            var csrfToken='{{csrf_token()}}';
            var likesCount=parseInt($('#'+commentId+"-count").text());
            $.post('{{route('toggleLike')}}', {commentId: commentId,_token:csrfToken}, function (data) {
                console.log(data);
               if(data.message==='liked'){
                   $(elem).addClass('liked');
                   $('#'+commentId+"-count").text(likesCount+1);
                   $(elem).css({color:'red'});
               }else{
                   $(elem).css({color:'black'});
                   $('#'+commentId+"-count").text(likesCount-1);
                   $(elem).removeClass('liked');
               }
            });

        }


</script>