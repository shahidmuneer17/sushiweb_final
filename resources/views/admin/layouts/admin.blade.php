<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Add your styles and scripts here -->
</head>
<body>
    @include('admin.layouts.header')

    <div id="app">
        @yield('content')
    </div>

    @include('admin.layouts.footer')

    <!-- Add your scripts here -->
</body>
</html>