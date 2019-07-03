<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{__('admin.admin-panel')}}</title>
    <link rel="author" href="{{ asset ('humans.txt')}}"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('icons/safari-pinned-tab.svg') }}" color="#4a6978">
    <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="{{ __('site.name') }}">
    <meta name="application-name" content="{{ __('site.name') }}">
    <meta name="msapplication-TileColor" content="#4a6978">
    <meta name="msapplication-TileImage" content="{{ asset('icons/mstile-144x144.png') }}">
    <meta name="msapplication-config" content="{{ asset('icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#4a6978">
    <link href="{{ asset ('css/admin.css')}}" rel="stylesheet">
</head>

<body>
<header>
    @include('admin.includes.nav')
</header>

<main role="main" class="container">
    @yield('content')
</main>
<footer class="footer">
    <div class="container text-center">
        <span class="text-muted">E-shop ©{{ date('Y') }}. All rights reserved.</span>
    </div>
</footer>
<script src="{{ asset('js/admin.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#datatable').dataTable({
            "language": {
                "sEmptyTable": "No data available in table",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
                "sInfoEmpty": "Showing 0 to 0 of 0 entries",
                "sInfoFiltered": "(filtered from _MAX_ total entries)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Show _MENU_ entries",
                "sLoadingRecords": "Loading...",
                "sProcessing": "Processing...",
                "sSearch": "Search:",
                "sZeroRecords": "No matching records found",
                "oPaginate": {
                    "sFirst": "First",
                    "sLast": "Last",
                    "sNext": "Next",
                    "sPrevious": "Previous"
                },
                "oAria": {
                    "sSortAscending": ": activate to sort column ascending",
                    "sSortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>
</body>
