<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="icon" href="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ url('') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ url('') }}/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ url('') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ url('') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ url('') }}/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('') }}/css/style.css" rel="stylesheet">
  @yield('style')
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </style>

</head>

<body>
@include('panel.adminlayout.header')
<main id="main" class="main">
    @yield('content')
</main>
@include('panel.adminlayout.sidebar')
@include('panel.adminlayout.footer')

  
  <!-- Vendor JS Files -->
  <script src="{{ url('') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('') }}/vendor/quill/quill.min.js"></script>
  <script src="{{ url('') }}/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ url('') }}/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ url('') }}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('') }}/js/main.js"></script>
  @yield('scripts')
</body>
</html>