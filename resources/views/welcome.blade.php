<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <style>
            * { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                background-color: #0a0a0a;
                font-family: 'Instrument Sans', sans-serif;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }
            .card {
                background-color: #1a1a1a;
                border: 1px solid #2e2e2e;
                border-radius: 12px;
                padding: 2rem 2.5rem;
                min-width: 320px;
            }
            .name {
                color: #ffffff;
                font-weight: 700;
                font-size: 1rem;
                margin-bottom: 0.25rem;
            }
            .nim {
                color: #a1a09a;
                font-size: 0.9rem;
                margin-bottom: 1.25rem;
            }
            .btn {
                display: inline-block;
                background-color: #f5f5f0;
                color: #1a1a18;
                border: none;
                border-radius: 6px;
                padding: 0.45rem 1rem;
                font-size: 0.875rem;
                font-family: inherit;
                cursor: pointer;
                text-decoration: none;
            }
            .btn:hover {
                background-color: #e5e5e0;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <p class="name">Andhika prima hutama</p>
            <p class="nim">20230140239</p>
            <a href="#" class="btn">Modul Pertemuan 1</a>
        </div>
    </body>
</html>
