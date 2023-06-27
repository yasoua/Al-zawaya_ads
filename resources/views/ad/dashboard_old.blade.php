

{{--<x-nav-barbar />--}}


<x-layout>


{{--    <div class="row col-12">--}}
        <div class="row col-12 {{--d-flex--}} text-right">
            <a href="{{ route('ad.create') }}" {{--data-bs-toggle="modal" data-bs-target="#add_modal"--}} class="btn btn-primary btn-block badge-pill shadow-sm w-auto d-flex align-items-center"><i class="iconify fs-6 me-1" data-icon="uil:plus"></i>Add</a>
            <a href="{{ route('lead.index') }}" class="btn btn-primary btn-block badge-pill shadow-sm w-auto d-flex align-items-center"><i class="iconify fs-6 me-1" data-icon="ic:baseline-person"></i>All Leads</a>
{{--hhgfghgfgh--}}
        </div>
        <div class="row col-12">

        </div>
{{--    </div>--}}


{{--    gfdfdfgdfg--}}
    <div>
{{--        gfdfdfgdfgdfgdfg--}}
    </div>
    <div class="">
{{--        <button id="editedit" class="btn  badge-pill btn-primary btn-block shadow-sm mr-2"><i class="pt-1 pr-2 float-left fas fa-plus"></i>edit</button>--}}

    </div>
    <section class="{{--alert secondary--}}">
        <div class=" ms-2 me-2 {{--container-fluid--}} pb-5 ">
            <div class="row bg-white rounded border w-90 m-auto mb-4">
                <div class="col-12 h-100 overflow-visible border-right ">
                    <table class="table table-hover text-center align-middle">
                        <thead class="thead-dark">
                        <tr>
                            <th class="table_col">NO</th>
                            <th class="table_col">Title</th>
{{--                            <th class="table_col">Description</th>--}}
                            <th class="table_col">Price</th>
                            <th class="table_col">Expire Date</th>
                            <th class="table_col">Status</th>
                            <th class="table_col">Leads</th>
                            <th class="table_col">Links</th>
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
                                <td>{{$ad->price}}</td>
                                <td>{{$ad->expire_at}}</td>
                                <td>{{$ad->status}}</td>
{{--                                  @if($ad->status == "1")--}}
{{--                                    <td>Active</td>--}}
{{--                                  @else--}}
{{--                                      <td>Inactive</td>--}}
{{--                                  @endif--}}
                                  <td>
{{--                                      <form method="GET" action="/">--}}
{{--                                          @if(request('category'))--}}
{{--                                              <input type="hidden" name="category" value="{{request('category')}}{{$ad->id}}">--}}
{{--                                          @endif--}}
                                      <a href="{{ route('lead.indexByAd', $ad->id) }}">
                                          <button type='button' class="btn btn-secondary"  name="lead" id="lead">Leads</button>
                                      </a>
                                  </td>


                                  <td>
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


            </div>
        </div>
    </section>
    <div class="modal overflow-auto" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel"> Add AD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="insert_form" enctype="multipart/form-data" {{--action="{{route('add_new_ad')}}" --}}{{--method="POST"--}}>
                    @csrf
                    <div class="modal-body text-center">

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label> Title </label>
                                <input type="text" class="form-control" name="title" />
{{--                                @error('title')--}}
{{--                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>--}}
{{--                                @enderror--}}
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="title_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> Description </label>
                                <input type="text" class="form-control " name="description" />
{{--                                @error('description')--}}
{{--                                <p class="text-red-500 text-xs py-2 ">{{ $message }}</p>--}}
{{--                                @enderror--}}
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="description_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> price </label>
                                <input type="string" class="form-control" name="price" />
{{--                                @error('price')--}}
{{--                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>--}}
{{--                                @enderror--}}
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="price_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> discount </label>
                                <input type="string" class="form-control" name="discount" />
{{--                                @error('discount')--}}
{{--                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>--}}
{{--                                @enderror--}}
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="discount_feedback"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Picture</label>
                                <input type="file" class="form-control p-0" name="picture" />
{{--                                @error('picture')--}}
{{--                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>--}}
{{--                                @enderror--}}
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="picture_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>expair date</label>
                                <input type="date" class="form-control" name="expire_at" />
{{--                                @error('expire_at')--}}
{{--                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>--}}
{{--                                @enderror--}}
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="expire_at_feedback"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <div class="text-start" style="display: inline-block">
                                    <label for="inputAddress2"> Status </label>
                                    <br>


                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input  type="radio" id="customRadioInline1" name="status" value="1" class="custom-control-input" />
                                        <label class="custom-control-label" for="customRadioInline1">active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="status" value="0" class="custom-control-input" />
                                        <label class="custom-control-label" for="customRadioInline2">inactive</label>
                                    </div>
                                </div>
                                @error('status')
{{--                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>--}}
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="status_feedback"></div>
                            </div>



                        </div>


                    </div>
                    <div class="modal-footer">


{{--                        <input type="hidden" name="Add_New_Ad"  id="Add_New_Ad" value="1" />--}}

{{--                        <button type="submit"  name="submit_button" id="submit_button" class="btn btn-primary"  >submit </button>--}}
                        <input type="submit" name="submit_button" id="submit_button"  class="btn btn-primary" value="add" />

                        <!-- <i class="fas fa-save pr-2 shadow-sm"></i> save </input> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times pr-2 shadow-sm"></i> close </button>

                    </div>

                    <div class="form-error"></div>

                </form>
            </div>
        </div>
    </div>



    <div class="modal " id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel"> Add AD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit_form" enctype="multipart/form-data" {{--action="{{route('add_new_ad')}}" --}} method="POST">
{{--                    @method('PUT')--}}
                    @csrf
                    <input type="hidden" id="edit_ad_id">
                    <div class="modal-body text-center">

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label> Title </label>
                                <input type="text" class="form-control" name="title" id="edit_title"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="edit_title_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> Description </label>
                                <input type="text" class="form-control " name="description" id="edit_description"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="edit_description_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> price </label>
                                <input type="string" class="form-control" name="price" id="edit_price"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="edit_price_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> discount </label>
                                <input type="string" class="form-control" name="discount" id="edit_discount"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="edit_discount_feedback"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Picture</label>
                                <img src="" class="card-img-top mb-2" alt="ad-picture" id="edit_picture_img" style="max-width: 100%; border: 1px solid black;">
                                <input type="file" class="form-control p-0" name="picture" id="edit_picture_input"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="edit_picture_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>expair date</label>
                                <input type="date" class="form-control" name="expire_at" id="edit_expire_at"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="edit_expire_at_feedback"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <div class="text-start" style="display: inline-block">
                                    <label for="inputAddress2"> Status </label>
                                    <br>


                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="edit-status1" name="status" value="1" class="custom-control-input" />
                                        <label class="custom-control-label" for="edit-status1">active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="edit-status0" name="status" value="0" class="custom-control-input" />
                                        <label class="custom-control-label" for="edit-status0">inactive</label>
                                    </div>
                                    <div class=" mt-1 mb-3 text-danger custom-ajax-feedback" id="status_expire" hidden>Expire</div>

                                </div>

                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="edit_status_feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="edit_submit_button" id="edit_submit_button" class="btn btn-primary" value="update" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times pr-2 shadow-sm"></i> close </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
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

