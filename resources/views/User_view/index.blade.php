@extends('layout.user.app')

@section('internal_css')
  <style type="text/css">
      .margin{
margin-left: 20px;
      }
  </style>  
  
@endsection

@section('content')

    <main class="mdl-layout__content">

         <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--6-col-phone">
      
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Welcome Back, {{ Auth::user()->name }} </h2>
            </div>
        </div>


<div class="margin">
    <h2>My Courses</h2>
</div>

        <div class="mdl-grid mdl-grid--no-spacing dashboard">
           
            <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
 
                <!-- Pie chart-->
                @foreach($result as $key=>$value)
                <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">{{ $value->name}}</h2>
                    </div>
                    <div class="mdl-card">
                        <img src="{{ asset('/images/cource/'.$value->image) }}" width="100%" height="100%">
                    </div>
                    
                    <div class="mdl-card__title">
                    
                        <a href="{{ url('user_cource_details/'.$value->id.'/0') }}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue">
                        Start Learning 
                        </button></a>
                        
                       
                    </div>
                </div>
            </div>


                      @endforeach   
                </div>
                </div>
                <!-- Line chart-->

                        
                

    </main>   
@endsection