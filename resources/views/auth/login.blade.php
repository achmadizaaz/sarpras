<x-guest-layout>
    <div class="login-brand">
        <img src="assets/img/logo-pdmti.png" alt="logo" width="100" class="bg-white shadow-light rounded-circle border border-4 border-white">
      </div>
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-primary rounded-3">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST"  action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                  <div class="form-group">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<x-label for="password" :value="__('Password')" />
                      <div class="float-end">
                        @if (Route::has('password.request'))
                            <a class="text-small" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                      </div>
                    </div>
                    <x-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    
                    <x-button class="btn btn-primary btn-lg btn-block">
                        {{ __('Log in') }}
                    </x-button>
                  </div>
                </form>

              </div>
            </div>         

        </div>
    </div>
        </x-guest-layout>
