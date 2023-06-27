<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Log;

class LeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['publicStore']); // specify which methods need login and which not need.;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//
//        Log::info('LeadController');
//        Log::info('index');
//        Log::info($ad_id);
//
//        if ($ad_id == 0)
//        {
            $leads = Lead::all();

            $pendingLeadsCount = $leads->where('status', 'pending')->count();
            $contactedLeadsCount = $leads->where('status', 'contacted')->count();
            $wonLeadsCount = $leads->where('status', 'won')->count();
            $lostLeadsCount = $leads->where('status', 'lost')->count();

//        }
//        else
//        {
//            $leads = Lead::where('ad_id', $ad_id)->get();
//        }


//        $leads = Lead::with('ad')->where('ad_id', $ad_id)->get();
//        $leads = Lead::with('ad')->get();

//        dd($leads);

//       return view('leads',[
//           'leads' => Lead::all()
//       ]);
        return view('lead.index', ['leads' => $leads, 'pendingLeadsCount' => $pendingLeadsCount, 'contactedLeadsCount' => $contactedLeadsCount, 'wonLeadsCount' => $wonLeadsCount, 'lostLeadsCount' => $lostLeadsCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the ad with the given ID
//        $ad = Ad::findOrFail($id);
//        dd($id);
        // Retrieve all the leads associated with the ad
//        $lead = Lead::where('ad_id', $id)->first();
        $lead = Lead::with('ad','comments','lastUpdatedBy')->findOrFail($id);
//        dd($lead->lastUpdatedBy);
//        $lead = $ad->Lead;
//        dd($lead);
//        $leads =
//        Log::info($leads);
//          dd($lead);

//
//        foreach ([$leads] as $lead)
//            dd($lead->id);


        // Pass the leads to a view for display
        return view('lead.view', ['lead' => $lead]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
    }

    public function changeStatus(Request $request, $id)
    {

        Log::info('changeStatus');
        Log::info('$request->status;');
        Log::info($request->status);
        Log::info('$request->notes;');
        Log::info($request->notes);

        $lead = Lead::findOrFail($id);

        if ($request->status == 'lost')
        {
            $attributes = $request->validate([
                'notes' => 'required',
            ]);
        }

        $lead->status = $request->status;
        $lead->notes = $request->notes;
        $lead->last_updated_by = auth()->user()->id;



        Log::info('$lead->status;');
        Log::info($lead->status);
        Log::info('$lead->notes;');
        Log::info($lead->notes);



        $lead->save();


        session()->flash('flash_icon', 'success');
        session()->flash('flash_message', 'Status changed successfully');

        Session::flash('success', 'Status changed successfully');
        return response()->json(['status' => 'success']);

    }

    public function publicStore(Request $request)
    {

//        Log::info('store');
//        Log::info($request);


        $attributes = $request->validate([
            'name' => ['required','string','max:255'],
            'phone' => 'required|string|max:255',
        ]);

        $attributes['ad_id'] = $request->ad_id;
        $attributes['status'] = 'pending';



        Lead::create($attributes);


        session()->flash('flash_icon', 'success');
        session()->flash('flash_message', 'تم التسجيل بنجاح');


        session()->flash('register_success');


        return redirect(route('ad.publicShow', Ad::where('id',$request->ad_id)->pluck('public_link')->first()));

//        Session::flash('success', 'successfully add new ad');
//        return response()->json(['status' => 'success']);
    }

    public function indexByAd($ad_id)
    {

        Log::info('LeadController');
        Log::info('index');
        Log::info($ad_id);

        if ($ad_id == 0)
        {
            $leads = Lead::all();
        }
        else
        {
            $leads = Lead::where('ad_id', $ad_id)->get();
        }


//        $leads = Lead::with('ad')->where('ad_id', $ad_id)->get();
//        $leads = Lead::with('ad')->get();

//        dd($leads);

//       return view('leads',[
//           'leads' => Lead::all()
//       ]);
        return view('lead.index', ['leads' => $leads]);
    }
}
