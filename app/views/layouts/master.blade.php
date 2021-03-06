<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Social Notes</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/custom-buttons.css">
        <link rel="stylesheet" href="/css/navbar-footer.css">
        <link rel="stylesheet" href="/css/meetups.css">
        <link rel="stylesheet" href="/css/sheets.css">
        <link rel="stylesheet" href="/css/notes.css">
        <link rel="stylesheet" href="/css/users.css">
        <!-- Add CSRF Token as a meta tag in your head -->
        <meta name="csrf-token" content="{{{ csrf_token() }}}">
        @yield('top-script')
    </head>
    <body>
        @include('partials.navbar')

        @if (Session::has('successMessage'))
            <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
        @endif

        @yield('content')
        
        @include('partials.footer')

        {{-- script tags for jQuery and Bootstrap --}}
        <script src="/js/jquery-1.11.3.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/sheets.js"></script>
        <script src="/js/notes.js"></script>
        <script src="/js/users.js"></script>
        @yield('bottom-script')
    </body>
</html>