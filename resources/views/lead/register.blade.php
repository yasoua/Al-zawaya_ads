<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Alzawaya Ads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

{{--    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/css/style.css">--}}

    <!-- sweet alert -->
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}" />


</head>
<body style="background-color: #c6e0d9;">

    @if (session('register_success'))
        <div class="d-flex justify-content-center" style="width: 100%; height: 100vh;">
            <div class="align-self-center">
                <div class="card border rounded-5">
                    <div class="card-body  aligns-items-center justify-content-center text-center " dir="rtl">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="text-success ">لقد تم تسجيلك بنجاح</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if($ad->valid)

            <div class="row col-12 justify-content-center">
                <div class="col-md-12 col-xl-6 p-5">
                    <div class="card rounded-3 ">
                        <div class="card-body  aligns-items-center justify-content-center text-center" dir="rtl">

                            <img src="{{ asset('public/images') . '/' . $ad->picture }}" class="card-img-top" alt="ad-picture" style="/*width: 516px; height: 516px;*/ max-width: 100%; height: auto; /*border: 1px solid black;*/">
                            <h5 class="card-title">{{$ad->title}}</h5>
                            <p class="card-text">{{$ad->description}}</p>
                            <p class="card-text" dir="rtl"><small class="text-muted">تاريخ الانتهاء : {{ $ad->expire_at }}</small></p>
                            {{--                            <div class="col-12">--}}
                            {{--                                    <?php echo isset($_SESSION['registration_error']) ? $_SESSION['registration_error'] : '';  ?>--}}
                            {{--                            </div>--}}
                            <div class="card-body p-4 p-md-5">
                                <h3 class=" ">معلومات التسجيل</h3>
                                <p class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 ">املأ البيانات التالية وسيقوم كادر المبيعات بالتواصل معك</p>


                                <form id="register-form" enctype="multipart/form-data" class="px-md-2" method="post" action="{{ route('lead.publicStore') }}" >
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1q"><span class="text-danger">*</span> يرجى ادخال الاسم الكامل</label>

                                        <input type="text" id="form3Example1q" class="form-control" name="name"/>
                                        @error('name')
                                        <p class="text-danger text-xs py-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1q"><span class="text-danger">*</span> يرجى ادخال رقم هاتف صحيح</label>

                                        <input type="text" id="form3Example1q" class="form-control" name="phone"/>
                                        @error('phone')
                                        <p class="text-danger text-xs py-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <input type="hidden" name="ad_id"   value="{{$ad->id}}" />
                                    @error('ad_id')
                                    <p class="text-danger text-xs py-2" hidden>{{ $message }}</p>
                                    @enderror

                                    <input type="hidden" name="register_new_lead" value="">

                                    <button type="submit" class="btn btn-success btn-lg mb-1">تسجيل</button>

                                    {{--                                    @if(auth()->user())--}}

                                    {{--                                    @endif--}}

                                </form>

                            </div>
                        </div>

                        <p class="text-center" style="font-size: 12px" dir="rtl">شركة الزوايا للدعاية والاعلان الوكيل الحصري لشركة MTuTECH في العراق</p>
                    </div>



                </div>



            </div>

        @else
            {{--        <div class="d-flex justify-content-center" style="width: 100%; height: 100vh;">--}}
            {{--            <div class="align-self-center text-bg-dark">--}}
            {{--                <h2 class="text-danger fw-bold" dir="rtl">المعذرة، لقد انتهت فترة التسجيل لهذا الاعلان !</h2>--}}
            {{--            </div>--}}
            {{--        </div>--}}




            <div class="d-flex justify-content-center" style="width: 100%; height: 100vh;">
                <div class="align-self-center">
                    <div class="card border rounded-5">
                        <div class="card-body  aligns-items-center justify-content-center text-center " dir="rtl">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="text-danger ">المعذرة، لقد انتهت فترة التسجيل لهذا الاعلان !</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        @endif
    @endif







{{--<section class="h-100  h-custom" style="background-color: #c6e0d9;">--}}
{{--    <div class="container py-5 h-100">--}}
{{--        <div class="row d-flex justify-content-center align-items-center h-100">--}}
{{--            <div class="col-md-12 col-xl-6">--}}
{{--                <div class="card rounded-3 ">--}}
{{--                    <div class="card-body  aligns-items-center justify-content-center text-center" dir="rtl">--}}
{{--                        @if(!$ad->expire)--}}
{{--                            <img src="/public/images/{{$ad->picture}}" class="card-img-top" alt="ad-picture" style="width: 516px; height: 516px; border: 1px solid black;">--}}
{{--                            <h5 class="card-title">{{$ad->title}}</h5>--}}
{{--                            <p class="card-text">{{$ad->description}}</p>--}}
{{--                            <p class="card-text"><small class="text-muted">{{$ad->expire_at}}:  تاريخ الانتهاء</small></p>--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <?php echo isset($_SESSION['registration_error']) ? $_SESSION['registration_error'] : '';  ?>--}}
{{--                                                    </div>--}}
{{--                            <div class="card-body p-4 p-md-5">--}}
{{--                                <h3 class=" ">معلومات التسجيل</h3>--}}
{{--                                <p class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 ">شركة الزوايا للدعاية والاعلان الوكيل الحصري لشركة MTuTECH في العراق</p>--}}


{{--                                <form id="register-form" enctype="multipart/form-data" class="px-md-2" method="post" action="{{ route('lead.publicStore') }}" >--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-outline mb-4">--}}
{{--                                        <label class="form-label" for="form3Example1q">* يرجى ادخال الاسم الكامل</label>--}}

{{--                                        <input type="text" id="form3Example1q" class="form-control" name="name"/>--}}
{{--                                        @error('name')--}}
{{--                                        <p class="text-danger text-xs py-2">{{ $message }}</p>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

{{--                                    <div class="form-outline mb-4">--}}
{{--                                        <label class="form-label" for="form3Example1q">* يرجى ادخال رقم هاتف صحيح</label>--}}

{{--                                        <input type="text" id="form3Example1q" class="form-control" name="phone"/>--}}
{{--                                        @error('phone')--}}
{{--                                        <p class="text-danger text-xs py-2">{{ $message }}</p>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

{{--                                    <input type="hidden" name="ad_id"   value="{{$ad->id}}" />--}}
{{--                                    @error('ad_id')--}}
{{--                                    <p class="text-danger text-xs py-2" hidden>{{ $message }}</p>--}}
{{--                                    @enderror--}}

{{--                                                                    <input type="hidden" name="register_new_lead" value="">--}}

{{--                                    <button type="submit" class="btn btn-success btn-lg mb-1">تسجيل</button>--}}
{{--                                    @if(auth()->user())--}}

{{--                                    @endif--}}

{{--                                </form>--}}

{{--                            </div>--}}
{{--                    </div>--}}
{{--                        @else--}}
{{--                            <h2 class="text-danger"> Expire</h2>--}}
{{--                        @endif--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>

<!-- sweet alert -->
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

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

    // alert('000');

    @if(session()->has('flash_icon') && session()->has('flash_message'))
    swalMessage("{{ session('flash_icon') }}", "{{ session('flash_message') }}");
    {{ session()->forget('flash_icon') }}
    {{ session()->forget('flash_message') }}
    @endif


    @if(session()->get('errors'))
    swalMessage("error", "لقد حدث خطأ ما");
    @endif
    // alert('111');
</script>
