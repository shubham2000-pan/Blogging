@extends('layouts.website.app')

@section('internal_css')
    
  
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{asset('style/images/page-banner-4.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== BLOG PART START ======-->
    
    <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
             @foreach($result as $key=>$value)
               <div class="col-lg-6">
               
                   <div class="singel-blog mt-30">
                    
                       <div class="blog-thum">
                           <img src="{{ asset('/images/Blog/banner/'.$value->banner_image)}}" alt="Blog">
                       </div>
                       <div class="blog-cont">
                           <a href="{{url('blog_detailes/'.$value->id)}}"><h3>{{ $value->name}}</h3></a>
                           <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>{{ dateFormat($value->created_at) }}</a></li>
                               <li><a href="#"><i class="fa fa-user"></i>{{ $value->teacher}}</a></li>
                               <li><a href="#"><i class="fa fa-tags"></i>{{ $value->type}}</a></li>
                           </ul>
                           <p>{{ $value->heading }}</p>
                       </div>
                      
                   </div> <!-- singel blog -->
                   
                   
               </div>
                @endforeach
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->
    @endsection
