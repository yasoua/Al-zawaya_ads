
<!doctype html>

<title>Al-zawaya Ads</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

{{--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<!-- sweet alert -->
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}" />

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif" >

<x-nav-bar />
<section class="container p-3" style="margin-left: 30px !important; margin-right: 30px !important; max-width: calc(100% - 60px) !important;">

    {{ $slot }}

</section>
<x-footer />
@if(session()->has('success'))
    <div x-data="{ show : true}"
         x-init="setTimeout(()=> show = false,400)"
         x-show="show"
         class="fixed bg-blue-500 text-white py-2 px-4 bottom-0 right-3 rounded">

        <p>
            {{session('success')}}
        </p>
    </div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- sweet alert -->
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<!-- iconify -->
<script src="{{ asset('assets/js/iconify.min.js') }}"></script>
</body>

<script>
    function swalMessage (ntficon,messagetoshow) // used to show the notification messages --- "ntficon" receives the icon that needed to show with the message --- "messagetoshow" receives the message itself.
    {
        Swal.fire({
            icon: ntficon,
            text: messagetoshow,
            toast: true,
            position: 'top-end',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            customClass: {
                confirmButton: 'btn btn-primary',
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },

        })
    }

    @if(session()->has('flash_icon') && session()->has('flash_message'))
    swalMessage("{{ session('flash_icon') }}", "{{ session('flash_message') }}");
    {{ session()->forget('flash_icon') }}
    {{ session()->forget('flash_message') }}
    @endif

</script>
