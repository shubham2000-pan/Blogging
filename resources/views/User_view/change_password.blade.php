@extends('layout.user.app')

@section('internal_css')
 <style type="text/css">
      .margin{
margin-left: 130px;
      }

      h6{
        color: lime;
      }
  </style>  
  
@endsection

@section('content')
<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
<main class="mdl-layout__content">
    <div class="mdl-card mdl-card__login mdl-shadow--2dp">
       
        <div class="mdl-card__supporting-text color--dark-gray">
            <div class="mdl-grid">
                <form action="{{ url('change_password') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="login-name text-color--white">Change password</span>
                   

                </div>
                 @if($errors->any())
                <h6>{{$errors->first()}}</h6>
                 @endif
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="password" class="mdl-textfield__label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="mdl-textfield__input" name="old_password" required autocomplete="new-password">

                                
                            </div>
                        </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="password" class="mdl-textfield__label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="mdl-textfield__input" name="new_password" required autocomplete="new-password">

                                
                            </div>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="password-confirm" class="mdl-textfield__label text-md-right">{{ __('Confirm New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="mdl-textfield__input" name="new_password" required autocomplete="new-password">
                            </div>
                        </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                <span class="login-secondary-text text-color--smoke">(we need your old password to confirm your changes)</span>
            </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                    <div class="mdl-layout-spacer"></div>
                    
                    
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                            CHANGE PASSWORD
                        </button>
                   
                </div>
            </form>
            </div>
        </div>
    </div>
    </main>
</div>
    @endsection