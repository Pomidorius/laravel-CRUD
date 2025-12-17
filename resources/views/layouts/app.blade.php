<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel Mini CRUD') }}</title>
    <style>
        :root {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #111;
            background-color: #f2f2f2;
        }
        body {
            margin: 0;
            min-height: 100vh;
            background-color: #f2f2f2;
        }
        .site-header {
            background: #0b4f8a;
            color: #fff;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .site-header a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }
        .site-content {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        label {
            font-weight: 600;
        }
        input {
            padding: 0.65rem;
            border-radius: 0.35rem;
            border: 1px solid #d1d5db;
        }
        button, .button-link {
            padding: 0.6rem 1.2rem;
            border-radius: 0.35rem;
            border: none;
            background: #0b4f8a;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }
        .flash-message {
            margin-bottom: 1rem;
            padding: 0.75rem 1rem;
            border-radius: 0.35rem;
            background: #ecfccb;
            color: #365314;
        }
        .error-list {
            margin-bottom: 1rem;
            padding: 0.75rem 1rem;
            border-radius: 0.35rem;
            background: #fee2e2;
            color: #991b1b;
        }
        .actions {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <header class="site-header">
        <span>{{ config('app.name', 'Laravel Mini CRUD') }}</span>
    </header>
    <main class="site-content">
        @if (session('status'))
            <div class="flash-message">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
