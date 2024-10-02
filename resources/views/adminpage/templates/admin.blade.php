<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">
</head>
<body>
@include('adminpage.templates.layouts.navbar')
@include('adminpage.templates.layouts.sidebar')

<div class="content" id="content">
    <div class="container-fluid py-4">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("sidebarToggle").addEventListener("click", function() {
        var sidebar = document.getElementById("sidebar");
        var content = document.getElementById("content");
        sidebar.classList.toggle("show");
        content.classList.toggle("shifted");
    });
</script>
</body>
</html>
