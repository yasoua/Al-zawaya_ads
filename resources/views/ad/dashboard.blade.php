

<style>
    /*table{*/
    /*    width: 50%;*/
    /*}*/
    /*td, th{*/
    /*    border: 1px solid orange;*/
    /*}*/


    /*@media only screen and (max-width: 576px) {*/
    /*    . d-none d-md-table-cell{*/
    /*        display: none;*/
    /*    }*/

    /*    .small-screen-show{*/
    /*        display: initial;*/
    /*    }*/
    /*}*/

</style>


<x-layout>
    <div class="row col-12 p-3 {{--col-12--}} {{--d-flex--}} text-right {{--my-4--}} ">
        <a href="{{ route('ad.create') }}"  class="btn btn-primary btn-block badge-pill shadow-sm w-auto d-flex align-items-center"><i class="iconify fs-6 me-1" data-icon="uil:plus"></i>Add</a>
        <a href="{{ route('lead.index') }}" class="btn btn-primary btn-block badge-pill shadow-sm w-auto d-flex align-items-center mx-2"><i class="iconify fs-6 me-1" data-icon="ic:baseline-person"></i>All Leads</a>
    </div>

    <div class="row col-12 {{--my-3--}}">
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #4099ff, #73b4ff);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Total Ads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $Ads->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #2ed8b6, #59e0c5);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Active Ads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $activeAdsCount }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #FFB64D, #ffcb80);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Inactive Ads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $inactiveAdsCount }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #FF5370, #ff869a);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Expired Ads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $expiredAdsCount }}</div>
                </div>
            </div>
        </div>
    </div>


{{--    <div class="row">--}}
{{--        <div class="col-xl-3 col-md-6">--}}
{{--            <div class="card bg-primary text-white mb-4">--}}
{{--                <div class="card-body">Total Ads</div>--}}
{{--                <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                    <a class="small text-white stretched-link" href="#">View Details</a>--}}
{{--                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-3 col-md-6">--}}
{{--            <div class="card bg-warning text-white mb-4">--}}
{{--                <div class="card-body">Warning Card</div>--}}
{{--                <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                    <a class="small text-white stretched-link" href="#">View Details</a>--}}
{{--                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-3 col-md-6">--}}
{{--            <div class="card bg-success text-white mb-4">--}}
{{--                <div class="card-body">Success Card</div>--}}
{{--                <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                    <a class="small text-white stretched-link" href="#">View Details</a>--}}
{{--                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-3 col-md-6">--}}
{{--            <div class="card bg-danger text-white mb-4">--}}
{{--                <div class="card-body">Danger Card</div>--}}
{{--                <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                    <a class="small text-white stretched-link" href="#">View Details</a>--}}
{{--                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="row col-12 p-3 mb-3">
        <table class="table table-hover text-center align-middle">
            <thead class="thead-dark">
            <tr>
                <th class="table_col">ID</th>
                <th class="table_col ">Title</th>
                {{--                            <th class="table_col">Description</th>--}}
                <th class="table_col  d-none d-md-table-cell">Price</th>
                <th class="table_col  d-none d-md-table-cell">Expire Date</th>
                <th class="table_col ">Status</th>
                <th class="table_col  d-none d-md-table-cell">Leads</th>
                <th class="table_col  d-none d-md-table-cell">Links</th>
                <th class="table_col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($Ads -> count() )
                @foreach($Ads as $ad)
                    <tr>
                        <td>{{$ad->id}}</td>
                        <td>{{$ad->title}}</td>
                        {{--                                <td>{{$ad->description}}</td>--}}
                        <td class=" d-none d-md-table-cell">{{$ad->price}}</td>
                        <td class=" d-none d-md-table-cell">{{$ad->expire_at}}</td>
                        <td>{{$ad->status}}</td>
                        {{--                                  @if($ad->status == "1")--}}
                        {{--                                    <td>Active</td>--}}
                        {{--                                  @else--}}
                        {{--                                      <td>Inactive</td>--}}
                        {{--                                  @endif--}}
                        <td class=" d-none d-md-table-cell">
                            <a href="{{ route('lead.indexByAd', $ad->id) }}">
                                <button type='button' class="btn btn-secondary"  name="lead" id="lead">Leads</button>
                            </a>
                        </td>


                        <td class=" d-none d-md-table-cell">
                            <button type="button" class="btn btn-secondary ad-public-link" data-ad-public-link="{{$ad->public_link}}" data-ad-title="{{$ad->title}}" {{--data-bs-toggle="modal"  data-bs-target="#ad-public-link-modal"--}}>Link</button>
                        </td>
                        {{--                                  <a href="{{ route('ad.publicShow', str($ad->public_link))  }}">--}}
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="iconify fs-4 d-flex" data-icon="mi:options-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item d-flex" href="{{ route('ad.show', $ad->id) }}"><i class="iconify me-2 mt-1" data-icon="uil:eye"></i> View</a></li>
                                    <li><a class="dropdown-item edit-ad d-flex" href="{{ route('ad.edit', $ad->id) }}"><i class="iconify me-2 mt-1" data-icon="uil:edit"></i> Edit</a></li>
                                    <li><a class="dropdown-item delete-ad d-flex" href="#" data-ad-id="{{$ad->id}}"><i class="iconify me-2 mt-1" data-icon="uil:trash"></i> Delete</a></li>
                                    <li><a class="dropdown-item d-flex d-md-none" href="{{ route('lead.indexByAd', $ad->id) }}"><i class="iconify me-2 mt-1" data-icon="ic:baseline-person"></i> Leads</a></li>
                                    <li><a type="button" class="dropdown-item d-flex d-md-none ad-public-link" href="#" data-ad-public-link="{{$ad->public_link}}" data-ad-title="{{$ad->title}}"><i class="iconify me-2 mt-1" data-icon="ph:link-simple-bold"></i> Link</a></li>
                                    </a>
                                </ul>
                            </div>
                        </td>
                    </tr>


                @endforeach

            @else
                <tr><td colspan="9">No ads to show</td></tr>
            @endif

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="ad-public-link-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ad-public-link-modal-title">Ad title: </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="basic-url" class="form-label">Your vanity URL</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">Link</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" value="">
                        </div>
                        <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#" target="_blank" type="button" class="btn btn-primary" id="ad-public-link-modal-href"> view
                        {{--                        <button type='button' class="btn btn-primary" name="lead" id="lead">View</button>--}}
                    </a>
                    <button type="button" class="btn btn-primary copy-public-link">Copy Link</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</x-layout>

<script>





    var empty_add_modal = $('#add_modal').html();

    var empty_edit_modal = $('#edit_modal').html();
    // // alert(test);

    $(document).ready(function(){
        $("#insert_form").on("submit", function(e) {



            $('#submit_button').prop("disabled", true);


            e.preventDefault();



            $.ajax({
                url: "{{route('ad.store')}}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {

                    if (data.status == 'success') {
                        location.reload();
                    }

                    // if(data.success)
                    // {
                    //     // alert(data.success);
                    // }
                    // location.reload();

                    if (data.success) {

                        // // alert("successs");
                        {{--$('#add_modal').html('<div class="w-100 text-center mt-3 alert alert-success alert-dismissible fade show" role="alert"><?php echo ('saved_alert'); ?><button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');--}}
                        // $('#add_modal').html(test);


                        // setTimeout(function() {
                        location.reload();
                        // }, 1500);


                    }
                    // else {
                    //
                    //
                    //     $('#submit_button').prop("disabled", false);
                    //
                    //
                    //     $('#add_modal .form-error').html('<div class="w-100 text-center mt-3 alert alert-danger alert-dismissible fade show" role="alert">' + data + '<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    //
                    //
                    //     setTimeout(function() {
                    //         $('.form-error .alert-dismissible').remove();
                    //     }, 120000);
                    // }
                },
                error: function(response) {
                    // // alert('error');
                    // // alert(response);
                    console.log(response);
                    $.each(response.responseJSON.errors, function(key, value){ // view error response messages that comes from the request during validation
                        $('#' + key + '_feedback').html(value);
                    });
                    $('#submit_button').prop("disabled", false);
                    // $('#add_modal').html(test);
                },
            });
        });



        $("#edit_form").on("submit", function(e) {

            console.log($(this).serialize());



            var dataimg = new FormData();
            var files = $('#edit_picture_input')[0].files[0];
            dataimg.append('edit_picture_input',files);


            console.log(files);

            $('#edit_submit_button').prop("disabled", true);




            var the_form = $(this).serialize() + " &picture=" + files;


            e.preventDefault();

            var id = $("#edit_ad_id").val();
            var url = "{{ route('ad.update', ':id') }}";
            url = url.replace(':id', id);

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });


            let formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{ route('ad.update', 5) }}",
                data: formData,
                contentType: false,
                processData: false,
                // url: url,
                // type: "PUT",
                {{--method: "PUT",--}}
                    {{--// headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},--}}
                    {{--token: "{{ csrf_token() }}" ,--}}
                    {{--data: new FormData(this) + "&_token={{csrf_token()}}",--}}
                    {{--data: new FormData(this),--}}
                    {{--// datatype: 'JSON',--}}
                    {{--data: {'1':1 , '2':2 , '_method': "PUT", '_token': "{{ csrf_token() }}"},--}}
                    {{--// data: the_form,--}}
                    {{--contentType: false,--}}
                    {{--cache: false,--}}
                    {{--processData: false,--}}
                success: function(data) {

                    if (data.status == 'success') {
                        location.reload();
                    }

                    // if(data.success)
                    // {
                    //     // alert(data.success);
                    // }
                    // location.reload();

                    if (data.success) {

                        // // alert("successs");
                        {{--$('#add_modal').html('<div class="w-100 text-center mt-3 alert alert-success alert-dismissible fade show" role="alert"><?php echo ('saved_alert'); ?><button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');--}}
                        // $('#add_modal').html(test);


                        // setTimeout(function() {
                        location.reload();
                        // }, 1500);


                    }
                    // else {
                    //
                    //
                    //     $('#submit_button').prop("disabled", false);
                    //
                    //
                    //     $('#add_modal .form-error').html('<div class="w-100 text-center mt-3 alert alert-danger alert-dismissible fade show" role="alert">' + data + '<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    //
                    //
                    //     setTimeout(function() {
                    //         $('.form-error .alert-dismissible').remove();
                    //     }, 120000);
                    // }
                },
                error: function(response) {
                    // alert('error');
                    // alert(response);
                    console.log(response);
                    $.each(response.responseJSON.errors, function(key, value){ // view error response messages that comes from the request during validation
                        $('#edit_' + key + '_feedback').html(value);
                    });
                    $('#edit_submit_button').prop("disabled", false);
                    // $('#add_modal').html(test);
                },
            });
        });






        {{--$("#submit_button").click(function (e) {--}}
        {{--    // // alert("submit_button : clicked");--}}
        {{--    $('#submit_button').prop("disabled", true);--}}
        {{--    e.preventDefault();--}}
        {{--    $.ajax({--}}
        {{--        url: "{{ route('add_new_ad') }}",--}}
        {{--        type: "POST",--}}
        {{--        //  data: new FormData(this),--}}
        {{--        //  data: $("#insert-form").serialize(),--}}
        {{--        data: $("#insert_form").serialize(),--}}
        {{--        // data: $("#insert_form").serialize(),--}}
        {{--        contentType: false,--}}
        {{--        cache: false,--}}
        {{--        processData: false,--}}
        {{--        success: function(data) {--}}
        {{--             // // alert();--}}

        {{--            if( data == 1 ){--}}

        {{--                $('#add_modal .form-error').html('<div class="w-100 text-center mt-3 alert alert-success alert-dismissible fade show" role="alert"> <?php echo ('saved_alert'); ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');--}}

        {{--                setTimeout(function() {--}}
        {{--                    location.reload();--}}
        {{--                }, 1500);--}}
        {{--            } else {--}}
        {{--                $('#submit_button').prop("disabled", false);--}}


        {{--                $('#add_modal .form-error').html('<div class="w-100 text-center mt-3 alert alert-danger alert-dismissible fade show" role="alert">' + data + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');--}}


        {{--                setTimeout(function() {--}}
        {{--                    $('.form-error .alert-dismissible').remove();--}}
        {{--                }, 120000);--}}

        {{--            }--}}

        {{--        },--}}
        {{--        error: function(data) {--}}
        {{--            // // alert("ajax : error");--}}
        {{--            // alert(data.error);--}}
        {{--            // // alert(data);--}}
        {{--        },--}}


        {{--    });--}}
        {{--});--}}

    });

    $('.delete-ad').click(function() {
        var id = $(this).data('ad-id');
        var url = "{{ route('ad.destroy', ':id') }}";
        url = url.replace(':id', id);
        var token = "{{ csrf_token() }}";
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted record!",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
            customClass: {
                confirmButton: 'btn btn-sm btn-primary mr-3 /*rounded-pill*/ mx-2',
                cancelButton: 'btn btn-sm btn-secondary /*rounded-pill*/ mx-2'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    },
                });
            }
        });

    });


    $('.edit-ad').click(function () {
        {{--const url = "{{ route('ad.edit') }}";--}}
        {{--$(MODAL_LG + ' ' + MODAL_HEADING).html('...');--}}
        {{--$.ajaxModal(MODAL_LG, url);--}}

        var id = $(this).data('ad-id');
        var url = "{{ route('ad.edit', ':id') }}";
        url = url.replace(':id', id);
        var token = "{{ csrf_token() }}";
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                '_token': token,
                '_method': 'GET'
            },
            success: function(data) {
                if (data.status == 'success') {
                    // location.reload();
                    // alert(data.ad.title);
                    $("#edit_ad_id").val(data.ad.id);
                    $("#edit_title").val(data.ad.title);
                    $("#edit_description").val(data.ad.description);
                    $("#edit_price").val(data.ad.price);
                    $("#edit_discount").val(data.ad.discount);
                    // $("#edit_picture_img").src("/public/images/" + data.ad.picture);
                    $("#edit_picture_img").prop("src", "/public/images/" + data.ad.picture);
                    // $("#edit_expire_at").val(data.ad.expire_at);

                    $("#edit_expire_at").val(data.ad.expire_at);
                    if (data.ad.status == 1)
                    {
                        // alert(data.ad.status);
                        // $("#edit-status1").checked(true);
                        $("#edit-status1").prop("checked", true);
                    }
                    else{
                        // $("#edit-status0").checked(true);
                        $("#edit-status0").prop("checked", true);
                    }

                    if (data.ad.expire)
                    {
                        // // alert(data.ad.expire);
                        $("#status_expire").prop("hidden", false);
                    }
                    else{
                        $("#status_expire").prop("hidden", true);
                    }


                    $("#edit_modal").modal('show');
                }
            },
        });
    });


    $("#edit_picture_input").on( "change", function () {

        $("#edit_picture_img").prop("hidden", true);
    });




    $('#editedit').click(function () {
        // alert('editedit clicked');
        $("#edit_modal").modal('show');




    });

    $("#add_modal").on("hidden.bs.modal", function(){
        $("#add_modal").html(empty_add_modal);
    });

    $("#edit_modal").on("hidden.bs.modal", function(){
        $("#edit_modal").html(empty_edit_modal);
    });

    $('.ad-public-link').click(function () {

        // // alert('ad-public-link clicked');

        var ad_title = $(this).data('ad-title');
        // // alert(ad_title);
        var ad_publicLink = $(this).data('ad-public-link');
        // // alert(ad_publicLink);
        var url = "{{ route('ad.publicShow', ':publicLink') }}";
        url = url.replace(':publicLink', ad_publicLink);

        $('#ad-public-link-modal-title').html("Ad title: " + ad_title);
        $('#ad-public-link-modal-href').prop('href', url);
        $('#basic-url').val(url);

        $('#ad-public-link-modal').modal('show');


    });

    $('.copy-public-link').on('click',function (){
        var textBox = document.getElementById("basic-url");
        textBox.select();
        document.execCommand("copy");

    });



</script>
