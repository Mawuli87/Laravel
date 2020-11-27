@extends('layouts.front')
@section('banner')
<div class="jumbotron">
   
 <div class="container">


        <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="3000" id="bs-carousel">
            <!-- Overlay -->
          
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#bs-carousel" data-slide-to="1"></li>
              <li data-target="#bs-carousel" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item slides active">
                <div class="slide-1">
                    <div class="overlay"></div>
                </div>
                <div class="hero">
                  <hgroup>
                    <h2>Join Developers Community</h2>
                    <h3>Help and get helped</h3>
                    <h4>It will be useful to have a platform of experienced developers to guide newbies how and what we need to start in a career as a developer.</p>
                    </h4>
                  </hgroup>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Learn more
                  </button>
                </div>
              </div>
              <div class="item slides">
                <div class="slide-2">
                    <div class="overlay"></div>
                </div>
                <div class="hero">        
                  <hgroup>
                     
<!-- Button trigger modal -->

  
             <h2>Help Someone Choose a perfect career to become a Good Developer</h2>


                  </hgroup>       
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Learn more
                  </button>
                </div>
              </div>
              <div class="item slides">
                <div class="slide-3">
                    <div class="overlay"></div>
                </div>
                <div class="hero">        
                  <hgroup>
                      <h2>It is gonna be an amazing platform</h2>        
                      <h3>Get start your first step life changing suggestions</h3>
                  </hgroup>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Learn more
                  </button>
                </div>
              </div>
            </div> 
          </div>




       </p>
    </div>





 <!-- Modal -->
 <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Developer Career Choice</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          How to become a good developer ?. I read on some platform, people asking what programming language should i start with ?

        What are the best combination of programming Language we need to learn to become a Developer ? I personally jumped into some programming language initially but realised later that that is not what really i needed for what i want to become ?
        <p>It will be useful to have a platform of experienced developers to guide newbies how and what we need to start in a career as a developer.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
 
 </div>






</div>
@endsection
@section('heading','threads')
    

@section('content')
@include('thread.partials.thread-list')
<div class="space"></div>
@include('layouts.partials.footer')
@endsection