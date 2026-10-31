<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700&family=IBM+Plex+Sans:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #EDF1EC;
            --panel: #FAFBF9;
            --ink: #14281F;
            --muted: #5B6B62;
            --line: #CBD6CE;
            --accent: #E8590C;
            --live: #1F9D55;
            color-scheme: light dark;
        }
        @media (prefers-color-scheme: dark) {
            :root {
                --bg: #0E1713;
                --panel: #15231C;
                --ink: #E6EFE9;
                --muted: #93A59B;
                --line: #2B4036;
                --accent: #FF8A4C;
                --live: #4ADE80;
            }
        }
        * { box-sizing: border-box; margin: 0; }
        html { background: var(--bg); }
        body {
            min-height: 100vh;
            background: var(--bg);
            color: var(--ink);
            font-family: "IBM Plex Sans", system-ui, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
        }
        a { color: inherit; }
        a:focus-visible { outline: 2px solid var(--accent); outline-offset: 3px; }

        .wrap { width: 100%; max-width: 960px; margin: 0 auto; padding: 0 24px; }

        header { padding: 24px 0; }
        header .wrap { display: flex; align-items: center; justify-content: space-between; gap: 16px; }
        .brand { font-family: "Bricolage Grotesque", system-ui, sans-serif; font-weight: 700; font-size: 18px; text-decoration: none; }
        nav { display: flex; gap: 8px; }
        nav a {
            text-decoration: none; font-size: 14px; font-weight: 500;
            padding: 6px 16px; border: 1px solid var(--line); border-radius: 6px;
            background: var(--panel);
        }
        nav a:hover { border-color: var(--ink); }

        main { flex: 1; padding: 48px 0 64px; }

        h1 {
            font-family: "Bricolage Grotesque", system-ui, sans-serif;
            font-weight: 700;
            font-size: clamp(2.5rem, 7vw, 4.75rem);
            line-height: 1.02;
            letter-spacing: -0.03em;
            max-width: 13ch;
        }
        .lead { margin-top: 24px; max-width: 52ch; color: var(--muted); font-size: 18px; }

        .actions { margin-top: 32px; display: flex; flex-wrap: wrap; gap: 12px; }
        .btn {
            display: inline-block; text-decoration: none; font-weight: 500; font-size: 15px;
            padding: 10px 22px; border-radius: 6px; border: 1px solid var(--ink);
        }
        .btn.primary { background: var(--ink); color: var(--bg); }
        .btn.primary:hover { background: var(--accent); border-color: var(--accent); color: #fff; }
        .btn.ghost:hover { border-color: var(--accent); color: var(--accent); }

        .pipeline {
            margin-top: 64px;
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 32px;
        }
        .pipeline h2 {
            font-family: "Bricolage Grotesque", system-ui, sans-serif;
            font-size: 22px; letter-spacing: -0.01em;
        }
        .pipeline > p { color: var(--muted); margin-top: 4px; font-size: 15px; }

        .steps { list-style: none; padding: 0; margin-top: 32px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 0; }
        .steps li { position: relative; padding-right: 24px; }
        .steps li::before {
            content: ""; position: absolute; top: 9px; left: 22px; right: 0;
            border-top: 2px solid var(--line);
        }
        .steps li:last-child::before { display: none; }
        .dot {
            position: relative; display: block; width: 20px; height: 20px; border-radius: 50%;
            background: var(--panel); border: 2px solid var(--ink);
        }
        .steps li:last-child .dot { background: var(--live); border-color: var(--live); animation: pulse 2.4s ease-out 1; }
        .steps strong { display: block; margin-top: 16px; font-weight: 500; }
        .steps span.d { display: block; color: var(--muted); font-size: 14px; line-height: 1.5; margin-top: 2px; }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 color-mix(in srgb, var(--live) 60%, transparent); }
            100% { box-shadow: 0 0 0 16px transparent; }
        }
        @media (prefers-reduced-motion: reduce) { .dot { animation: none !important; } }

        .facts { margin-top: 32px; display: flex; flex-wrap: wrap; gap: 8px 32px; font-size: 14px; color: var(--muted); }
        .facts b { color: var(--ink); font-weight: 500; }

        footer { border-top: 1px solid var(--line); padding: 20px 0; font-size: 14px; color: var(--muted); }
        footer .wrap { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 8px; }
        footer a { text-underline-offset: 3px; }

        @media (max-width: 640px) {
            .pipeline { padding: 24px 20px; }
            .steps { grid-template-columns: 1fr; gap: 28px; }
            .steps li { padding-right: 0; padding-left: 36px; }
            .steps li::before { top: 22px; bottom: -28px; left: 9px; right: auto; border-top: 0; border-left: 2px solid var(--line); }
            .steps li .dot { position: absolute; left: 0; top: 2px; }
            .steps strong { margin-top: 0; }
        }
    </style>
</head>
<body>
    <header>
        <div class="wrap">
            <a class="brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <main>
        <div class="wrap">
            <h1>Pushed from my laptop. Live on EC2.</h1>
            <p class="lead">This is my first Laravel app. Every push to GitHub updates this page automatically, with no manual login to the server.</p>

            <div class="actions">
                <a class="btn primary" href="https://laravel.com/docs" target="_blank" rel="noopener">Read the docs</a>
                <a class="btn ghost" href="https://github.com/Faisal-957/laravelfirstapp" target="_blank" rel="noopener">View the repository</a>
            </div>

            <section class="pipeline" aria-labelledby="pipeline-title">
                <h2 id="pipeline-title">How a change reaches this page</h2>
                <p>Three steps, started by a single git push.</p>

                <ol class="steps">
                    <li>
                        <span class="dot"></span>
                        <strong>Push</strong>
                        <span class="d">Commit in VS Code and push to the main branch.</span>
                    </li>
                    <li>
                        <span class="dot"></span>
                        <strong>Build</strong>
                        <span class="d">GitHub Actions connects over SSH and pulls the new code.</span>
                    </li>
                    <li>
                        <span class="dot"></span>
                        <strong>Live</strong>
                        <span class="d">Composer, migrations and caches run, then the health check passes.</span>
                    </li>
                </ol>
            </section>

            <div class="facts">
                <span>Laravel <b>v{{ app()->version() }}</b></span>
                <span>PHP <b>{{ PHP_VERSION }}</b></span>
                <span>Environment <b>{{ app()->environment() }}</b></span>
            </div>
        </div>
    </main>

    <footer>
        <div class="wrap">
            <span>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</span>
            <a href="https://laravel.com/docs/changelog" target="_blank" rel="noopener">Laravel changelog</a>
        </div>
    </footer>
</body>
</html>