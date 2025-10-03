<section style="display:flex; justify-content:center; align-items:center; min-height:100vh; background:#f5f7fa;">
    <div style="width:100%; max-width:400px; background:#fff; padding:25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
        
        <h2 style="text-align:center; margin-bottom:20px; color:#333; font-weight:700;">Login</h2>

        {{-- رسالة الخطأ العامة --}}
        @if(session('msg'))
            <div style="background:#f8d7da; color:#842029; padding:10px; border-radius:6px; margin-bottom:15px; font-size:14px; border:1px solid #f5c2c7;">
                {{ session('msg') }}
            </div>
        @endif

        {{-- الفورم --}}
        <form method="POST" action="{{ route('handlelogin') }}">
            @csrf

            {{-- Email --}}
            <div style="margin-bottom:20px;">
                <label for="email" style="display:block; font-weight:600; margin-bottom:6px;">Email address</label>
                <input type="email" id="email" name="email" placeholder="name@example.com"
                       style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
                @error('email')
                    <div style="color:#d9534f; font-size:13px; margin-top:5px;">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div style="margin-bottom:20px;">
                <label for="password" style="display:block; font-weight:600; margin-bottom:6px;">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                       style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;">
                @error('password')
                    <div style="color:#d9534f; font-size:13px; margin-top:5px;">{{ $message }}</div>
                @enderror
            </div>

            {{-- زرار تسجيل الدخول --}}
            <button type="submit" 
                    style="width:100%; background:#0d6efd; color:#fff; border:none; padding:12px; border-radius:6px; font-size:16px; font-weight:600; cursor:pointer;">
                Login
            </button>

            {{-- تسجيل جديد --}}
            <div style="text-align:center; margin-top:15px; font-size:14px;">
                <span style="color:#6c757d;">Don't have an account?</span>
                <a href="{{ route('register') }}" style="color:#0d6efd; font-weight:600; text-decoration:none; margin-left:5px;">Sign up</a>
            </div>
        </form>
    </div>
</section>
