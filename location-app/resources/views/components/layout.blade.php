<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Location Proje</title>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <style>

        html {
            margin: 0px;
            height: 100%;
            width: 100%;
        }

        body {
            margin: 0px;
            min-height: 100%;
            width: 100%;
        }

        body{
            background: #ddd9d9;
        }

        header{
            background: white;
            padding: 20px;
        }

        nav{
            display: flex;
            align-items: center;
            column-gap: 10px;
        }

        .header_h{
            margin: 0;
        }
        </style>


    </head>
    <body>

        <header>
            <nav>
                <div style="flex: 1;">
                    <h1 class="header_h">Ali EKEN</h1>
                </div>
                <div>
                    <a href="{{ route(name: 'konums.liste') }}" class="btn btn-primary">Konumlar</a>
                    <a href="{{ route('konums.add') }}" class="btn btn-success">Yeni Ekle</a> 
                </div>
                
            </nav>
        </header>

        <main class="container">
            {{$slot}}
        </main>
        
    </body>
</html>
