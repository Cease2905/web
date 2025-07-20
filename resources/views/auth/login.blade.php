<div style="
    background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), 
    url('https://images.unsplash.com/photo-1604176354204-9268737828e4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
    width: 100vw;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
    border: none;
    box-sizing: border-box;
">
    <div class="login-container" style="
        background-color: rgba(255,255,255,0.9);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        width: 400px;
        max-width: 90%;
        text-align: center;
        animation: fadeIn 0.8s ease-in-out;
    ">
        <div class="logo" style="margin-bottom:25px;">
            <i class="fas fa-tshirt" style="font-size:50px;color:#4a6baf;margin-bottom:10px;"></i>
            <h1 style="color:#333;font-size:24px;margin-bottom:5px;">Laundry Express</h1>
            <p style="color:#666;font-size:14px;">Silakan login untuk mengakses sistem</p>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group" style="margin-bottom:20px;text-align:left;">
                <label for="email" style="display:block;margin-bottom:8px;color:#555;font-weight:500;">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    style="width:100%;padding:12px 15px;border:2px solid #ddd;border-radius:8px;font-size:16px;transition:all 0.3s;"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="input-group" style="margin-bottom:20px;text-align:left;">
                <label for="password" style="display:block;margin-bottom:8px;color:#555;font-weight:500;">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    style="width:100%;padding:12px 15px;border:2px solid #ddd;border-radius:8px;font-size:16px;transition:all 0.3s;"
                >
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="block mt-4" style="text-align:left;">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        style="margin-right:8px;">
                    <span style="font-size:14px;color:#555;">Remember me</span>
                </label>
            </div>
            <button type="submit" style="
                width:100%;padding:12px;background-color:#4a6baf;color:white;border:none;border-radius:8px;
                font-size:16px;font-weight:600;cursor:pointer;transition:all 0.3s;margin-top:10px;
            ">Login</button>
            <div class="forgot-password" style="margin-top:20px;font-size:14px;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color:#4a6baf;text-decoration:none;">
                        Lupa password?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
