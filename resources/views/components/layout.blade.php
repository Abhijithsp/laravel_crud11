<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD 11</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-300 dark:bg-slate-700">

<x-navbar></x-navbar>
<div class="max-w-6xl mx-auto">
    @include('sweetalert::alert')
    {{$slot}}
</div>

</body>
</html>


