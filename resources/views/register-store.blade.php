<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create your store</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; background: #f5f6f8; margin: 0;
               min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .box { background: #fff; width: 100%; max-width: 420px; padding: 32px;
               border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
        h1 { margin: 0 0 4px; font-size: 24px; }
        p.sub { margin: 0 0 24px; color: #6b7280; }
        label { display: block; margin: 16px 0 6px; font-weight: 600; font-size: 14px; }
        input { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db;
                border-radius: 8px; font-size: 15px; }
        input:focus { outline: none; border-color: #2563eb; }
        .sub-wrap { display: flex; align-items: center; }
        .sub-wrap input { border-top-right-radius: 0; border-bottom-right-radius: 0; }
        .sub-wrap span { padding: 10px 12px; background: #f3f4f6; border: 1px solid #d1d5db;
                         border-left: 0; border-radius: 0 8px 8px 0; color: #6b7280; font-size: 14px; }
        button { width: 100%; margin-top: 24px; padding: 12px; background: #2563eb; color: #fff;
                 border: 0; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
        .alert { background: #fee2e2; color: #991b1b; padding: 10px 12px;
                 border-radius: 8px; margin-bottom: 8px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Create your store</h1>
        <p class="sub">Get your own online store in seconds.</p>

        @if ($errors->any())
            <div class="alert">Please fix the errors below.</div>
        @endif

        <form method="POST" action="{{ url('/register-store') }}">
            @csrf

            <label for="name">Store name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label for="subdomain">Store address</label>
            <div class="sub-wrap">
                <input type="text" id="subdomain" name="subdomain"
                       value="{{ old('subdomain') }}" placeholder="mystore" required>
                <span>.{{ parse_url(config('app.url'), PHP_URL_HOST) ?? 'localhost' }}</span>
            </div>
            @error('subdomain') <div class="error">{{ $message }}</div> @enderror

            <button type="submit">Create store</button>
        </form>
    </div>
</body>
</html>