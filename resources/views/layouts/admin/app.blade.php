<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard Starter Kits Pro</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
 {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset ('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset ('assets/admin/css/components.css') }}">

  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

  <!-- Sweetalert2 -->
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
            @include('layouts.admin.navbar')
            @include('layouts.admin.sidebar')


        @yield('content')

        @include('layouts.admin.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset ('assets/admin/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <!-- include summernote css/js -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <!-- Template JS File -->
  <script src="{{ asset ('assets/admin/js/scripts.js') }}"></script>
  <script src="{{ asset ('assets/admin/js/custom.js') }}"></script>

  <!-- Datatables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  <!-- Page Specific JS File -->
  <!-- Sweetalert2 -->
  <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
  <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      $('.delete-data').on('click', function(e){
        e.preventDefault()
        Swal.fire({
            icon: 'warning',
            title: 'Apakah kamu yakin ingin menghapusnya?',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
            confirmButtonColor: '#ff0000',
            cancelButtonColor: '#1010ff'
        }).then((result)=>{
            if(result.isConfirmed){
                $(this).next().submit();
            }
        })
      })
  </script>
  @if (session()->has('success'))
      <script>Toast.fire({icon:'success',title:"{{ session('success') }}"})</script>
  @endif
  @yield('script')
</body>
</html>
