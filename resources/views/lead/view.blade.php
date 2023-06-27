{{--<x-nav-bar />--}}

<x-layout>

    <section class="alert-secondary pt-4 mb-8" style="padding-bottom: 100px">
        <div class="{{--container-fluid--}}">
{{--            @foreach($leads as $lead) --}}

            <div class="overflow-hidden bg-white rounded border shadow-sm vh-90 position-relative">
                <div class="dropdown position-absolute top-0 end-0 pt-3 pe-2">

                    <i type="button" class="iconify fs-3" data-icon="mi:options-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>


                    <ul class="dropdown-menu">
{{--                        <li><a class="dropdown-item edit-lead d-flex" href="#" data-lead-id="{{$lead->id}}"><i class="iconify me-2 mt-1" data-icon="uil:edit"></i> Edit</a></li>--}}
{{--                        <li><a class="dropdown-item delete-lead d-flex" href="#" data-lead-id="{{$lead->id}}"><i class="iconify me-2 mt-1" data-icon="uil:trash"></i> Delete</a></li>--}}
                        <li><a class="dropdown-item change-status-lead d-flex" href="#" data-lead-id="{{$lead->id}}"><i class="iconify me-2 mt-1" data-icon="mdi:list-status"></i> Change Status</a></li>
                    </ul>
                </div>
                <div class="row p-5 m-auto bg-light shadow-sm vh-90">
                    <div class="col-6 d-flex justify-content-center">
                        <img src="{{ asset('public/images/user-fill.png') }}" alt="dbd" width="40" height="40">

                        <h2>Lead Information</h2>

                    </div>
                    <div class="col-6  d-flex justify-content-center">
                        <h2>@if($lead->ad) {{$lead->ad->title}} @else -- @endif</h2>
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col-6 text-center">
                        <div class="text-start" style="display: inline-block">
                            <div class="p-2">Name: @if($lead->name) {{$lead->name}} @else -- @endif</div>
                            <div class="p-2">Phone: @if($lead->phone) {{$lead->phone}} @else -- @endif</div>
                            <div class="p-2">registered at: @if($lead->created_at) {{$lead->created_at}} @else -- @endif</div>
                            <div class="p-2">Last Updated at : @if($lead->updated_at) {{$lead->updated_at}} @else -- @endif</div>
                            <div class="p-2">Last Updated by : @if($lead->lastUpdatedBy) {{$lead->lastUpdatedBy->name}} @else -- @endif</div>
                        </div>




                    </div>
                    <div class="col-6 text-center">
                        <div class="text-start" style="display: inline-block">
                            <div class="p-2"> Status: @if($lead->status) {{$lead->status}} @else -- @endif</div>
                            <div class="p-2"> Notes: @if($lead->notes) {{$lead->notes}} @else -- @endif</div>

                        </div>

                    </div>
                </div>


            </div>

        </div>


        <div class="overflow-hidden bg-white rounded border shadow-sm mt-5">
            <div class="row bg-light shadow-sm">
                <div class="col-12">
                    <div {{--method="POST" --}}class="p-3">
{{--                        @csrf--}}
                        <header class="align-items-center">
                            <div class="row">
                                <div class="col-8">
                                    <div class="d-flex">
                                        <img src="{{ asset('public/images/شركة-الزوايا.png') }}" alt="" width="30" height="30" class="rounded-3 align-self-center">
                                        <h4 class="ms-2 mt-1 align-self-center">Comment...</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" id="comment_post_btn">Post</button>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="mt-6">
                            <textarea name="body" class="w-100 font-italic border-0 bg-light" cols="30" rows="5" placeholder="Write your commend here.." id="comment_text"></textarea>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row p-1 m-auto shadow-sm">
                <div class="col-12 p-3" id="comments_container">
                    @if($lead->comments->count())
                        @foreach($lead->comments as $comment)
                            <article class="border rounded my-2 p-3">
                                <header class="align-items-center">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="d-flex">
                                                <img src="{{ asset('public/images/شركة-الزوايا.png') }}" alt="" width="30" height="30" class="rounded-3 align-self-center">
                                                <h4 class="ms-2 mt-1 align-self-center">{{ $comment->user->name }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-secondary delete-comment" data-comment-id="{{ $comment->id }}">Delete</button>
                                            </div>
                                        </div>
                                        <p class="my-2" style="font-size: 10px">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
                                    </div>
                                </header>
                                <p class="mt-2">{{ $comment->comment }}</p>
                            </article>
                        @endforeach
                    @else
                        <p class="fs-3 align-self-center text-center fw-bold">No Comments Found.</p>
                    @endif

                </div>
            </div>






        </div>





    </section>




    <div class="modal overflow-auto" id="change_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Change Lead Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
{{--                <form id="change_status_form" method="GET">--}}
{{--                    @csrf--}}

                    <input type="hidden" id="change_status_lead_id">

                    <div class="modal-body text-center">

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" id="change_status_status">
                                    <option value="pending">Pending</option>
                                    <option value="contacted">Contacted</option>
                                    <option value="won">Won</option>
                                    <option value="lost">lost</option>
                                </select>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="title_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Notes <span class="text-danger" id="change_status_notes_star" hidden>*</span></label>
                                <textarea class="form-control" name="notes" id="change_status_notes"></textarea>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="notes_feedback"></div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" name="change_status_submit_button" id="change_status_submit_button" class="btn btn-primary" value="update"/>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times pr-2 shadow-sm"></i> close </button>
                    </div>
{{--                </form>--}}
            </div>
        </div>
    </div>



</x-layout>



<script>
    $("#comment_post_btn").click(function (){
        // // // alert('comment_post_btn');
        var comment = $("#comment_text").val();
        // // // alert(comment);
        var lead_id = '{{ $lead->id }}';
        // // // alert(lead_id);
        var url = "{{ route('comment.store') }}";
        // url = url.replace(':id', id);
        var token = "{{ csrf_token() }}";
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                '_token': token,
                lead_id: lead_id,
                comment: comment,
                // '_method': 'DELETE'
            },
            success: function(data) {
                if (data.status == 'success') {
                    location.reload();
                }
            },
        });
    });

    $('.delete-comment').click(function() {
        var id = $(this).data('comment-id');
        var url = "{{ route('comment.destroy', ':id') }}";
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

    $('.change-status-lead').click(function () {

        {{--var id = $(this).data('lead-id');--}}

        {{--@foreach($leads as $lead)--}}
        {{--if ("{{ $lead->id }}" == id)--}}
        {{--{--}}
            $("#change_status_lead_id").val("{{ $lead->id }}");
            $("#change_status_status").val("{{ $lead->status }}");
            $("#change_status_notes").val("{{ $lead->notes }}");
            if ("{{ $lead->status }}" == "lost")
            {
                $("#change_status_notes_star").prop("hidden", false);
            }
            else
            {
                $("#change_status_notes_star").prop("hidden", true);
            }

        // }
{{--        @endforeach--}}

        // // // alert('editedit clicked');

        $("#change_status_modal").modal('show');
    });



    $("#change_status_status").change(function (){
        if ($("#change_status_status").val() == "lost")
        {
            $("#change_status_notes_star").prop("hidden", false);
        }
        else
        {
            $("#change_status_notes_star").prop("hidden", true);
        }

    });



    $("#change_status_submit_button").click(function (){



        var id = $("#change_status_lead_id").val();
        // // alert('id : ' + id);
        var url = "{{ route('lead.changeStatus', ':id') }}";
        url = url.replace(':id', id);
        var token = "{{ csrf_token() }}";
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                '_token': token,
                status : $("#change_status_status").val(),
                notes : $("#change_status_notes").val(),
                // '_method': 'POST'
            },
            success: function(data) {
                if (data.status == 'success') {
                    location.reload();
                    {{--location.href = "{{ route() }}";--}}

                }
            },
            error: function(response) {

                // // alert('error');

                console.log(response);

                $.each(response.responseJSON.errors, function(key, value){ // view error response messages that comes from the request during validation
                    $('#' + key + '_feedback').html(value);
                });

            },
        });
    });


</script>



{{--<x-footer />--}}
