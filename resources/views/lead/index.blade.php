

<x-layout>

    <div class="row col-12 {{--my-3--}}">
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #4099ff, #73b4ff);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Total Leads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $leads->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #FFB64D, #ffcb80);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Pending Leads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $pendingLeadsCount }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #757575, #c2c2c2);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Contacted Leads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $contactedLeadsCount }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #2ed8b6, #59e0c5);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Won Leads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $wonLeadsCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-12 {{--my-3--}}">
        <div class="col-lg-3 col-md-6 p-3">
            <div class="card shadow border-0 text-white" style="background: linear-gradient(45deg, #FF5370, #ff869a);">
                <div class="card-body ">
                    <div class="fw-bold fs-4 ">Lost Leads</div>
                    <br>
                    <div class="fw-bold fs-4 align-bottom" >{{ $lostLeadsCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-12 p-3 mb-3">
        <table class="table table-hover text-center align-middle">
            <thead class="thead-dark">
            <tr>
                <th class="table_col">NO</th>
                <th class="table_col">Name</th>
                <th class="table_col d-none d-md-table-cell">Phone</th>
                <th class="table_col d-none d-md-table-cell">Ads Title</th>
                <th class="table_col">Status</th>
                <th class="table_col">Action</th>

            </tr>
            </thead>
            <tbody>
            @if($leads->count())
                @foreach($leads as $lead)
                    <tr>
                        <td>{{$lead->id}}</td>
                        <td>{{$lead->name}}</td>
                        <td class="d-none d-md-table-cell">{{$lead->phone}}</td>
                        <td class="d-none d-md-table-cell">{{$lead->ad->title}}</td>
                        <td>{{$lead->status}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="iconify fs-4 d-flex" data-icon="mi:options-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item d-flex" href="{{ route('lead.show', $lead->id) }}"><i class="iconify me-2 mt-1" data-icon="uil:eye"></i> View</a></li>
                                    {{--                                            <li><a class="dropdown-item edit-lead d-flex" href="#" data-lead-id="{{$lead->id}}"><i class="iconify me-2 mt-1" data-icon="uil:edit"></i> Edit</a></li>--}}
                                    {{--                                            <li><a class="dropdown-item delete-lead d-flex" href="#" data-lead-id="{{$lead->id}}"><i class="iconify me-2 mt-1" data-icon="uil:trash"></i> Delete</a></li>--}}
                                    <li><a class="dropdown-item change-status-lead d-flex" href="#" data-lead-id="{{$lead->id}}"><i class="iconify me-2 mt-1" data-icon="mdi:list-status"></i> Change Status</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="6">No Leads to show</td></tr>
            @endif

            </tbody>
        </table>
    </div>



{{--        <form method="GET" action="/post/{{$ad->id}}/leads">--}}
{{--            @if(request('leads'))--}}
{{--            <input type="hidden" class='btn btn-secondary' name='lead' value="{{request('leads')}}">Leads</button>--}}
{{--            @endif--}}
{{--        </form>--}}

{{--    <section class="alert-secondary">--}}
{{--        <div class="mt-3 ms-2 me-2 container-fluid">--}}
{{--            <div class="row bg-white rounded border w-90">--}}
{{--                <div class="col-12 h-100 overflow-visible border-right p-0 ">--}}
{{--                    --}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <div class="modal overflow-auto" id="change_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Change Lead Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="change_status_form" method="GET">
                    @csrf

                    <input type="hidden" id="change_status_lead_id">

                    <div class="modal-body text-center">

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" id="change_status_status">
                                    <option value="pending">Pending</option>
                                    <option value="contacted">Contacted</option>
                                    <option value="won">Won</option>
                                    <option value="lost">Lost</option>
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
                </form>
            </div>
        </div>
    </div>


</x-layout>





<script type="text/javascript">


    $('.change-status-lead').click(function () {

        var id = $(this).data('lead-id');

        @foreach($leads as $lead)
            if ("{{ $lead->id }}" == id)
            {
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

            }
        @endforeach

        // // alert('editedit clicked');

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
        // alert('id : ' + id);
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

                    // alert('error');

                    console.log(response);

                $.each(response.responseJSON.errors, function(key, value){ // view error response messages that comes from the request during validation
                    $('#' + key + '_feedback').html(value);
                });

            },
        });
    });


</script>
