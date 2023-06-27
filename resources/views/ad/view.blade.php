<x-layout>
    <section class="alert-secondary pt-4 mb-8" style="padding-bottom: 100px">

        <div class="row p-2">
            <div class="col-8 text-start d-flex">
                    <img src="{{ asset('public/images/user-fill.png') }}" alt="dbd" width="40" height="40">
                    <h2>Ad Information</h2>
            </div>
            <div class="col-4 text-end">
                <div class="dropdown">
                    <i type="button" class="iconify fs-3" data-icon="mi:options-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item edit-ad d-flex" href="{{ route('ad.edit', $ad->id) }}"><i class="iconify me-2 mt-1" data-icon="uil:edit"></i> Edit</a></li>
                        <li><a class="dropdown-item delete-ad d-flex" href="#" data-ad-id="{{$ad->id}}"><i class="iconify me-2 mt-1" data-icon="uil:trash"></i> Delete</a></li>
{{--                        <li><a class="dropdown-item change-status-lead d-flex" href="#" data-lead-id="{{$ad->id}}"><i class="iconify me-2 mt-1" data-icon="mdi:list-status"></i> Change Status</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-4">
                <img src="{{ asset('public/images/'.$ad->picture)}}" alt="dbd" style="max-width: 100%">
            </div>
            <div class="col-8">
                <div class="p-2">Title: @if($ad->title) {{$ad->title}} @else -- @endif</div>
                <div class="p-2">Description: @if($ad->description) {!! $ad->description !!} @else -- @endif</div>
                <div class="p-2"> Price: @if($ad->price) {{$ad->price}} @else -- @endif</div>
                <div class="p-2">Discount : @if($ad->discount) {{$ad->discount}} @else -- @endif</div>
                <div class="p-2">Added by : @if($ad->added_by) {{$ad->added_by}} @else -- @endif</div>
                <div class="p-2">Last Updated by : @if($ad->lastUpdatedBy) {{$ad->lastUpdatedBy->name}} @else -- @endif</div>
                <div class="p-2">Expire Date : @if($ad->expire_at) {{$ad->expire_at}} @else -- @endif</div>
                <div class="p-2">Status: @if($ad->status == 1) Active @else Inactive @endif </div>
                <div class="p-2v d-flex ms-2">Is Expired: <div class="ms-2 @if($ad->expire) text-danger @else text-success @endif fw-bolder">@if($ad->expire) Expired @else Not Expired @endif</div></div>
                <div class="p-2">Notes: @if($ad->notes) {{$ad->notes}} @else -- @endif</div>
                <div class="p-2">Created at: @if($ad->created_at) {{$ad->created_at}} @else -- @endif</div>
                <div class="p-2">Last Updated at: @if($ad->updated_at) {{$ad->updated_at}} @else -- @endif</div>
                <div class="p-2">Last Updated by: @if($ad->lastUpdatedBy) {{$ad->lastUpdatedBy->name}} @else -- @endif</div>
            </div>
        </div>

</section>


    <div class="modal overflow-auto" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel"> Add AD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit_form" enctype="multipart/form-data" {{--action="{{route('add_new_ad')}}" --}}method="POST">
                    @csrf
                    <div class="modal-body text-center">

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label> Title </label>
                                <input type="text" class="form-control" name="title" id="edit_title" value="@if($ad->title) {{$ad->title}} @else -- @endif"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="title_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> Description </label>
                                <input type="text" class="form-control " name="description" id="edit_description" value="@if($ad->description) {{$ad->description}} @else -- @endif"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="description_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> price </label>
                                <input type="string" class="form-control" name="price" id="edit_price" value="@if($ad->price) {{$ad->price}} @else -- @endif"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="price_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> discount </label>
                                <input type="string" class="form-control" name="discount" id="edit_discount" value="@if($ad->discount) {{$ad->discount}} @else -- @endif"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="discount_feedback"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Picture</label>
                                <img src="{{ asset('public/images/'.$ad->picture)}}" alt="dbd" id="edit_picture_img" style="width: 514px; height: 514px; border: 1px solid black;">
                                <input type="file" class="form-control p-0" name="picture" id="edit_picture_input"/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="picture_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>expair date</label>
                                <input type="date" class="form-control" name="expire_at" id="edit_expire_at" value="@if($ad->expire) {{$ad->expire}} @else -- @endif "/>
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="expire_at_feedback"></div>
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

                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="status_feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="edit_submit_button" id="edit_submit_button"  class="btn btn-primary" value="update" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times pr-2 shadow-sm"></i> close </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-layout>

<script>
    var empty_edit_modal = $('#edit_modal').html();

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

    $("#edit_picture_input").on( "change", function () {

        $("#edit_picture_img").prop("hidden", true);
    });

    $("#edit_modal").on("hidden.bs.modal", function(){
        $("#edit_modal").html(empty_edit_modal);
    });
</script>
