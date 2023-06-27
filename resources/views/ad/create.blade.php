<x-layout>
    <section class="alert-secondary pt-4 mb-8 justify-content-center" style="padding-bottom: 100px">

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form id="edit_form" enctype="multipart/form-data" action="{{route('ad.store')}}" method="POST">
                    @csrf
                    <div class="modal-body text-center">

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label> Title </label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}"/>
                                @error('title')
                                <p class="text-danger text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="title_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> Description </label>
                                <textarea class="form-control" name="description">{{old('description')}}</textarea>

                                @error('description')
                                <p class="text-danger text-xs py-2 ">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="description_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> price </label>
                                <input type="string" class="form-control" name="price" value="{{old('price')}}"/>
                                @error('price')
                                <p class="text-danger text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="price_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label> discount </label>
                                <input type="string" class="form-control" name="discount" value="{{old('discount')}}"/>
                                @error('discount')
                                <p class="text-danger text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="discount_feedback"></div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Picture</label>
                                <input type="file" class="form-control p-0" name="picture" value="{{old('picture')}}"/>
                                @error('picture')
                                <p class="text-danger text-xs py-2">{{ $message }}</p>
                                @enderror
                                <div class="text-xs mt-1 mb-3 text-danger custom-ajax-feedback" id="picture_feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>expair date</label>
                                <input type="date" class="form-control" name="expire_at" value="{{old('expire_at')}}"/>
                                @error('expire_at')
                                <p class="text-danger text-xs py-2">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group col-md-12">
                                <div class="text-start mt-4" style="display: inline-block">
                                    <label for="inputAddress2"> Status </label>
                                     <br>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input @if(old('status')!= null && old('status') == 1) checked @endif type="radio" id="customRadioInline1" name="status" value="1" class="custom-control-input" />
                                        <label class="custom-control-label" for="customRadioInline1">active</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input @if(old('status')!= null && old('status') == 0) checked @endif type="radio" id="customRadioInline2" name="status" value="0" class="custom-control-input" />
                                        <label class="custom-control-label" for="customRadioInline2">inactive</label>
                                    </div>

                                </div>
                                @error('status')
                                <p class="text-danger text-xs py-2">{{ $message }}</p>
                                @enderror
                            </div>



                        </div>


                    </div>
                    <div class="modal-footer mt-5">


                        <div class="col-6 d-flex justify-content-start">
                            <input type="submit" name="submit_button" id="submit_button"  class="btn btn-primary" style="width: 80%" value="Add" />
                        </div>

                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('dashboard') }}" type="button" class="btn btn-secondary" style="width: 80%">Cancel</a>
                        </div>



                        <!-- <i class="fas fa-save pr-2 shadow-sm"></i> save </input> -->


                    </div>

                    <div class="form-error"></div>

                </form>
            </div>
        </div>

    </section>

</x-layout>


<script>

    @if(session()->get('errors'))
    swalMessage("error", "Error Occured");
    @endif

</script>


