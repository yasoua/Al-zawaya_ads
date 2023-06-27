<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Log;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['publicShow']); // specify which methods need login and which not need.
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        dd(Ad::where('id', 1)->pluck('expire_at')->first());

        $expiryDate = Carbon::parse('2023-04-26'); // Replace this with your expiry date

        $currentDate = Carbon::now();

        $stt = 0;

        if ($currentDate->greaterThan($expiryDate)) {
            $stt = 0;
        } else {
            $stt = 1;
        }

//        dd($expiryDate, $expiryDate->endOfDay(), $currentDate, $stt);



        $ads = Ad::all();


        $expiredAdsCount = 0;

        $currentDate = Carbon::now();

        foreach ($ads as $ad)
        {
            if ($currentDate->greaterThan(Carbon::parse($ad->expire_at)->endOfDay()))
            {
                $ad->status = 'Expire';
                $expiredAdsCount++;
            }
            else
            {
                if ($ad->status == 0)
                {
                    $ad->status = 'Inactive';
                }
                elseif ($ad->status == 1)
                {
                    $ad->status = 'Active';
                }
            }

        }


        $activeAdsCount = Ad::where('status', 1)->count();


        $inactiveAdsCount = Ad::where('status', 0)->count();




//        Session::flash('success', 'Ad updated successfully');

//        dd(Session::flash('success', 'Ad updated successfully'), view('ad.dashboard',['Ads' => $ads])->with('flash_success', 'test'));

////
//        session()->flash('flash_icon', 'success');
//        session()->flash('flash_message', 'successfully');




        return view('ad.dashboard',['Ads' => $ads, 'expiredAdsCount' => $expiredAdsCount, 'activeAdsCount' => $activeAdsCount, 'inactiveAdsCount' => $inactiveAdsCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


//        dd(User::create($attributes));


//        $attributes['password'] = bcrypt($attributes['password']); // to make the password encripted in database

//        dd($attributes);


//        auth()->login($Ad);
//        return response()->json(['success' => 'successfully add new ad']);

//        return redirect('/dashboard')->with('success','successfully add new ad');

        return view('ad.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Log::info('store');
        Log::info($request);


        $attributes = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => 'required|string|max:255',
            'picture' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|string|max:255',
            'discount' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'expire_at' => 'required|date_format:Y-m-d'

        ]);



//        if ($attributes->fails())
//        {
//            session()->flash('flash_icon', 'error');
//            session()->flash('flash_message', 'Error Ocured');
//        }

//        $errors = session('errors');

        Log::info('$errors');
//        Log::info($errors);

//        if ($errors)
//        {
//            session()->flash('flash_icon', 'error');
//            session()->flash('flash_message', 'Error Ocured');
//        }




        $ad = new Ad();

        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->price = $request->price;
        $ad->discount = $request->discount;
        $ad->status = $request->status;
        $ad->expire_at = $request->expire_at;
        $ad->notes = $request->notes;
        $ad->added_by = auth()->user()->id;
        $ad->public_link = md5(Carbon::now());



//        $expiryDate = Carbon::parse($request->expire_at)->endOfDay(); // Replace this with your expiry date
////        dd($expiryDate);
//        $currentDate = Carbon::now();
//
//        if ($currentDate->greaterThan($expiryDate)) {
//            $attributes['status'] = 0;
//        } else {
//            $attributes['status'] = 1;
//        }


        if (request()->hasFile('picture')) {
            $image = request()->file('picture');

            $extention = $image->getClientOriginalExtension();

//            $filename = uniqid().'.'.$image->getClientOriginalExtension();
            $filename = time().'.'.$extention;
//            $image->storeAs('public/images', $filename);
            $image->move('public/images',$filename);
//            Storage::disk('public')->putFileAs('images', $image, $filename);



//            $attributes['picture'] = $filename;
//            dd($attributes['picture']);

            $ad->picture = $filename;
        }

        Log::info($attributes);

        $attributes['public_link'] = md5(Carbon::now());

        //Ad::create($attributes);

        $ad->save();



//        Session::flash('success', 'successfully add new ad');
//        return response()->json(['status' => 'success']);

        session()->flash('flash_icon', 'success');
        session()->flash('flash_message', 'Ad added successfully');

        return redirect(route('dashboard'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
//        $ad = Ad::where('id', $id)->first();
        $ad = Ad::findOrFail($id);

        $currentDate = Carbon::now();

        if ($currentDate->greaterThan(Carbon::parse($ad->expire_at)->endOfDay()))
        {
            $ad->expire = true;
        }
        else
        {
            $ad->expire = false;
        }


//        dd($ad);

//        $expiryDate = Carbon::parse($ad->expire_at); // Replace this with your expiry date
//        dd($expiryDate);
//        $currentDate = Carbon::now();
//
//        if ($currentDate->greaterThanOrEqualTo($expiryDate)) {
//            // Perform action if the current date is equal to the expiry date
//            return ('heloo');
//        } else {
//            return view('register', ['ad' => $ad]);
            return view('ad.view', ['ad' => $ad]);
//        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        Log::info('id');

        Log::info($id);
        $ad = Ad::findOrFail($id);
//        Log::info($this->edit($id));

        $currentDate = Carbon::now();

        if ($currentDate->greaterThan(Carbon::parse($ad->expire_at)->endOfDay()))
        {
            $ad->expire = true;
        }
        else
        {
            $ad->expire = false;
        }
//        dd($a);

        return view('ad.edit', ['ad' => $ad]);

        return response()->json(['status' => 'success', 'ad' => $ad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        Log::info('update');
        Log::info($request);


        $attributes = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|string|max:255',
            'discount' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'expire_at' => 'required|date_format:Y-m-d'

        ]);
        Log::info($attributes);


        $ad = Ad::findOrFail($id);

        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->price = $request->price;
        $ad->discount = $request->discount;
        $ad->status = $request->status;
        $ad->expire_at = $request->expire_at;
        $ad->notes = $request->notes;
        $ad->last_updated_by = auth()->user()->id;





//        $expiryDate = Carbon::parse($request->expire_at)->endOfDay(); // Replace this with your expiry date
////        dd($expiryDate);
//        $currentDate = Carbon::now();
//
//        if ($currentDate->greaterThan($expiryDate)) {
//            $attributes['status'] = 0;
//        } else {
//            $attributes['status'] = 1;
//        }


        if (request()->hasFile('picture')) {
            $image = request()->file('picture');

            $extention = $image->getClientOriginalExtension();

//            $filename = uniqid().'.'.$image->getClientOriginalExtension();
            $filename = time().'.'.$extention;
//            $image->storeAs('public/images', $filename);
            $image->move('public/images',$filename);
//            Storage::disk('public')->putFileAs('images', $image, $filename);


            $ad->picture = $filename;
//            $attributes['picture'] = $filename;
//            dd($attributes['picture']);
        }

        Log::info($attributes);

//        $attributes['public_link'] = md5(Carbon::now());

//        Ad::create($attributes);



//        Ad::create($attributes);

        $ad->save();


        session()->flash('flash_icon', 'success');
        session()->flash('flash_message', 'Ad updated successfully');


        Session::flash('success', 'Ad updated successfully');
//        return view('ad.view', ['ad' => $ad]);
        return redirect(route('ad.show', $ad->id))->with(['ad' => $ad]);

//        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ad::destroy($id);
        Session::flash('success', 'Ad deleted successfully');
        session()->flash('flash_icon', 'success');
        session()->flash('flash_message', 'Ad deleted successfully');
        return response()->json(['status' => 'success']);
    }

    public function publicShow($publicLink)
    {

        $ad = Ad::where('public_link', $publicLink)->first();

        $currentDate = Carbon::now();

        if (($currentDate->greaterThan(Carbon::parse($ad->expire_at)->endOfDay())) || ($ad->status == 0))
        {
            $ad->valid = false;
        }
        else
        {
            $ad->valid = true;
        }




        return view('lead.register', ['ad' => $ad]);
    }
}
