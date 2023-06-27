<x-layout>
    <section class="alert-secondary pt-4 mb-8 justify-content-center" style="padding-bottom: 100px">

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form id="edit_form" enctype="multipart/form-data" action="{{route('ad.update', $ad->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body text-center">

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label> Title </label>
                                <input type="text" class="form-control" name="title" value="{{$ad->title}}"/>
                                @error('title')
                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="title_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> Description </label>
{{--                                <input type="text" class="form-control " name="description" />--}}
                                <textarea class="form-control" name="description">{{$ad->description}}</textarea>

                                @error('description')
                                <p class="text-red-500 text-xs py-2 ">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="description_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> price </label>
                                <input type="string" class="form-control" name="price" value="{{$ad->price}}"/>
                                @error('price')
                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="price_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> discount </label>
                                <input type="string" class="form-control" name="discount" value="{{$ad->discount}}"/>
                                @error('discount')
                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="discount_feedback"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Picture</label>
                                <img src="{{ asset('public/images').'/'.$ad->picture }}" class="card-img-top mb-2" alt="ad-picture" id="edit_picture_img" style="max-width: 100%; border: 1px solid black;">
                                <input type="file" class="form-control p-0" name="picture" id="picture"/>
                                @error('picture')
                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="picture_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>expair date</label>
                                <input type="date" class="form-control" name="expire_at" value="{{$ad->expire_at}}"/>
                                @error('expire_at')
{{--                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>--}}
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="expire_at_feedback"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <div class="text-start" style="display: inline-block">
                                    <label for="inputAddress2"> Status </label>
                                     <br>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input @if($ad->status == 1) checked @endif type="radio" id="customRadioInline1" name="status" value="1" class="custom-control-input" />
                                        <label class="custom-control-label" for="customRadioInline1">active</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input @if($ad->status == 0) checked @endif type="radio" id="customRadioInline2" name="status" value="0" class="custom-control-input" />
                                        <label class="custom-control-label" for="customRadioInline2">inactive</label>
                                    </div>
                                    @if($ad->expire)

                                    <div class=" mt-1 mb-3 text-danger custom-ajax-feedback" id="status_expire" >Expire</div>

                                    @endif


                                </div>
                                @error('status')
                                <p class="text-red-500 text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="status_feedback"></div>
                            </div>



                        </div>


                    </div>
                    <div class="modal-footer mt-5">


                        <div class="col-6 d-flex justify-content-start">
                            <input type="submit" name="submit_button" id="submit_button"  class="btn btn-primary" style="width: 80%" value="Save" />
                        </div>

                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('dashboard') }}" type="button" class="btn btn-secondary" style="width: 80%">Cancel</a>
                        </div>



                        <!-- <i class="fas fa-save pr-2 shadow-sm"></i> save </input> -->


                    </div>

                </form>
            </div>
        </div>

    </section>

</x-layout>

<script>
    var empty_edit_modal = $('#edit_form').html();

    $('.edit_form').on('submit', function () {
        {{--const url = "{{ route('ad.edit') }}";--}}
        {{--$(MODAL_LG + ' ' + MODAL_HEADING).html('...');--}}
        {{--$.ajaxModal(MODAL_LG, url);--}}

        var id = $(this).data('ad-id');
        var url = "{{ route('ad.edit', ':id') }}";
        url = url.replace(':id', id);
        var token = "{{ csrf_token() }}";
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                '_token': token,
                '_method': 'GET'
            },
            success: function(data) {
                if (data.status == 'success') {
                    // location.reload();
                    // // // alert(data.ad.title);
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
                        // // // alert(data.ad.status);
                        // $("#edit-status1").checked(true);
                        $("#edit-status1").prop("checked", true);
                    }
                    else{
                        // $("#edit-status0").checked(true);
                        $("#edit-status0").prop("checked", true);
                    }

                    if (data.ad.expire)
                    {
                        // // // // alert(data.ad.expire);
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

    $("#picture").on( "change", function () {

        $("#edit_picture_img").prop("hidden", true);
    });


</script>

<script>

    @if(session()->get('errors'))
    swalMessage("error", "Error Occured");
    @endif

</script>
