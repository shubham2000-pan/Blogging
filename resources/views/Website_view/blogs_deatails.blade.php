@extends('layouts.website.app')

@section('internal_css')
  <style type="text/css">
.hidden{
  display:none;
} 
.margin{
  margin-left: 200px;
  padding: 20px;
}
#btnn{
  background: transparent;
  border:none;
}
#btn{
  background: transparent;
  border:none;
}
.like{
  margin-right: 80px;
}
</style>  
  
@endsection

@section('content')

<!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{ asset('style/images/page-banner-4.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $result->name }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('blog')}}">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $result->name }}</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== BLOG PART START ======-->
    
    <section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
              <div class="col-lg-8">
                  <div class="blog-details mt-30">
                      <div class="thum">
                          <img src="{{ asset('/images/Blog/banner/'.$result->banner_image)}}" alt="Blog Details">
                      </div>
                      <div class="cont">
                          <h3>{{ $result->name}}</h3>
                          <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>{{ dateFormat($result->created_at) }}</a></li>
                               <li><a href="#"><i class="fa fa-user"></i>{{ $result->teacher}}</a></li>
                               <li><a href="#"><i class="fa fa-tags"></i>{{ $result->type }}</a></li>
                           </ul>
                           <p>{!! $result->about !!}
                           </p>
                           <ul class="share">
                               <li class="title">Share :</li>
                               <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           </ul>
                           <div class="blog-comment pt-45">
                               <div class="title pb-15">
                                   <h3>Comment ( {{ $blogc }} )</h3>
                               </div>  <!-- title -->
                               <ul>
                                  @foreach($comment as $key=>$value)
                                   <li>
                                       <div class="comment">
                                           <div class="comment-author">
                                                <div class="author-thum">
                                                    <img src="{{ asset('/images/user/'.$value->img) }}" alt="Reviews" height="80px" width="80px">
                                                </div>
                                                <div class="comment-name">
                                                    <h6>{{$value->name}}</h6>
                                                    <span>{{ dateFormat($value->created_at) }}</span>
                                                </div>
                                            </div>
                                            <div class="comment-description pt-20">
                                                <p>{{ $value->comment}}</p>
                                            </div>
                                            <div class="comment-replay like">
                                              <form id="comment_like">
                                            <input type="hidden" name="blog_id" value="{{ $result->id }}">
                                            <input type="hidden" name="comment_id" value="{{ $value->id }}">
                                            <input type="hidden" name="like" value="1">({{$like}})
                                            <input type="submit" name="likes" value="like"  id="btn" class="likes">
                                            </form>
                                            </div>
                                            <div class="comment-replay">
                                              ({{$replyc}})
                                            <input type="submit"  name="reply_name" value="Reply" class="reply_comment" id="btnn">
                                            </div>
                                                 <div class="hidden " id="Reply">       
                                    <div class="comment-form">
                                   <form id="comment_reply">
                                  @Auth
                                    <input type="hidden" name="user_id" value="{{ auth::user()->id }}">
                                    @endAuth
                                    <input type="hidden" name="blog_id" value="{{ $result->id }}">
                                    <input type="hidden" name="comment_id" value="{{ $value->id }}">
                                       <div class="row">
                                           <div class="col-md-9">
                                               <div class="form-singel">
                                                   <input type="text" name="massege" placeholder="message">
                                               </div> <!-- form singel -->
                                           
                                           </div>
                                           <div class="col-md-3">
                                            @Auth
                                               <div class="form-singel">
                                                   <button class="main-btn" id="blog-comment_reply">Send</button>
                                               </div> <!-- form singel -->
                                               @else
                                               <div class="form-singel">
                                                   <button class="main-btn">Login</button>
                                               </div> <!-- form singel -->
                                               @endAuth
                                           </div>
                                       </div> <!-- row -->
                                   </form>
                               </div>  <!-- comment-form -->
                                </div>
                                </div> <!-- comment -->
                                @if(!empty($reply))
                                       <ul class="replay">
                                        @foreach($reply as $key=>$value)
                                           <li>
                                               <div class="comment">
                                                   <div class="comment-author">
                                                        <div class="author-thum">
                                                            <img src="{{ asset('/images/user/'.$value->img) }}" alt="Reviews" height="80px" width="80px">
                                                        </div>
                                                        <div class="comment-name">
                                                        <h6>{{$value->nam}}</h6>
                                                    <span>{{ dateFormat($value->created_at) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="comment-description pt-20">
                                                        <p>{{$value->massege}}</p>
                                                    </div>
                                                    
                                                </div> <!-- comment -->
                                           </li>
                                           @endforeach
                                       </ul>
                                       @endif
                                        </li> 
                                        @endforeach 
                               </ul>

                               <div class="title pt-45 pb-25">
                                   <h3>Leave a comment</h3>
                               </div> <!-- title -->
                               <div class="comment-form">
                                   <form id="blog_form">
                                  @Auth
                                    <input type="hidden" name="user_id" value="{{ auth::user()->id }}">
                                    @endAuth
                                    <input type="hidden" name="blog_id" value="{{ $result->id }}">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-singel">
                                                   <input type="text" name="name" placeholder="Name">
                                               </div> <!-- form singel -->
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-singel">
                                                   <input type="email" name="email" placeholder="email">
                                               </div> <!-- form singel -->
                                           </div>
                                           <div class="col-md-12">
                                               <div class="form-singel">
                                                   <textarea name="comment" placeholder="Comment"></textarea>
                                               </div> <!-- form singel -->
                                           </div>
                                           <div class="col-md-12">
                                            @Auth
                                               <div class="form-singel">
                                                   <button class="main-btn" id="blog-comment">Submit</button>
                                               </div> <!-- form singel -->
                                               @else
                                               <div class="form-singel">
                                                   <button class="main-btn">Login</button>
                                               </div> <!-- form singel -->
                                               @endAuth
                                           </div>
                                       </div> <!-- row -->
                                   </form>
                               </div>  <!-- comment-form -->
                           </div> <!-- blog comment -->
                      </div> <!-- cont -->
                  </div> <!-- blog details -->
              </div>
               <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row">
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-search mt-30">
                                   <form action="#">
                                       <input type="text" placeholder="Search">
                                       <button type="button"><i class="fa fa-search"></i></button>
                                   </form>
                               </div> <!-- saidbar search -->
                               
                           </div> <!-- categories -->
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-post mt-30">
                                   <h4>Popular Posts</h4>
                                   <ul>
                                       @foreach($blog as $key=>$value)
                                       <li>
                                            <a href="#">
                                                <div class="singel-post">
                                                   <div class="thum">
                                                       <img src="{{ asset('images/Blog/front/'.$value->image)}}" alt="Blog">
                                                   </div>
                                                   <div class="cont">
                                                       <h6>{{ $value->name}}</h6>
                                                       <span>{{ dateFormat($value->created_at) }}</span>
                                                   </div>
                                               </div> <!-- singel post -->
                                            </a>
                                       </li>
                                       @endforeach
                                       
                                   </ul>
                               </div> <!-- saidbar post -->
                           </div>
                       </div> <!-- row -->
                   </div> <!-- saidbar -->
               </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->
    @endsection
    @section('footer_script')
  <script type="text/javascript">
    $(document).on('click','#blog-comment',function(e){
      e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/blog_comment-store') }}",
            type: 'post',
            data: new FormData($('#blog_form')[0]),
            success: function (response) {
           if (response.status) {
                  $('#blog_form')[0].reset();
                   alert('added successfully');
                } else {
                    alert('something went wrong...');
                }
            },
            error: function (e) {
                console.log(e);
            },
            processData: false,
            contentType: false
        });

    });
  </script>
  <script type="text/javascript">
        $('.reply_comment').on('click',function(){
          var val =  $("[name='reply_name']").val();
          if(val == 'Reply'){
            $('#Reply').removeClass('hidden');

          }else{
            $('#Reply').addClass('hidden');
          }
        });
      </script>
       <script type="text/javascript">
    $(document).on('click','#blog-comment_reply',function(e){
      e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/blog_comment_reply-store') }}",
            type: 'post',
            data: new FormData($('#comment_reply')[0]),
            success: function (response) {
               if (response.status) {
                  $('#comment_reply')[0].reset();
                   alert('added successfully');
                } else {
                    alert('something went wrong...');
                }
            },
            error: function (e) {
                console.log(e);
            },
            processData: false,
            contentType: false
        });

    });
  </script>
  <script type="text/javascript">
    $(document).on('click','#btn',function(e){
      e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/blog_comment_likes') }}",
            type: 'post',
            data: new FormData($('#comment_like')[0]),
            success: function (response) {
               if (response.status) {
                  $('#comment_like')[0].reset();
                   alert('added successfully');
                } else {
                    alert('something went wrong...');
                }
            },
            error: function (e) {
                console.log(e);
            },
            processData: false,
            contentType: false
        });

    });
  </script>
     
     
@endsection
