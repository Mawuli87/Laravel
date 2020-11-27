
<div class="list-group">
    @forelse ($threads as $thread)

    <div class="panel panel-primary">
      <div class="panel-heading">
          <h3 class="panel-title"><a href="{{route('thread.show',$thread->id)}}"> {{$thread->subject}}</a></h3>
      </div>
      <div class="panel-body">
          <p>{{str_limit($thread->thread,100) }}
              <br>
              Posted by <a href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a> {{$thread->created_at->diffForHumans()}}
          </p>
      </div>
  </div>
     @empty
     <h4>No threads</h4>
  @endforelse

</div>