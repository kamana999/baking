@extends('base')
@section('content')

<div class="form-modal">

<div class="form-toggle">
    <button id="login-toggle" onclick="toggleLogin()">log in</button>
    <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
</div>

<div id="login-form">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" placeholder="Enter email or username" type="email" name="email" :value="old('email')" required autofocus />
        <input type="password" placeholder="Enter password" type="password" name="password" required autocomplete="current-password" />
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('forget.password.get') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button type="submit" class="btn login">login</button>
        </div>
       
        <p><a href="javascript:void(0)">Forgotten account</a></p>
        <hr />
        <button type="button" class="btn -box-sd-effect"> <i class="fab fa-google fa-lg" aria-hidden="true"></i>
            sign in with google</button>
        <button type="button" class="btn -box-sd-effect"> <i class="fab fa-linkedin-in fa-lg"
                aria-hidden="true"></i> sign in with linkedin</button>
        <button type="button" class="btn -box-sd-effect"> <i class="fab fa-microsoft fa-lg"
                aria-hidden="true"></i>
            sign in with microsoft</button>
    </form>
</div>

<div id="signup-form">
    
        

       

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                <button type="submit" class="btn signup">SignUP</button>
                </x-jet-button>
            </div>
        </form>
  
</div>

</div>

@endsection