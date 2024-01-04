<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\RequestInfo;
use App\Models\User;



class ServiceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$services = Offer::where('user_id', auth()->user()->id)
                ->where('order_status', 1)
                ->get();

		 // Hizmetleri gösteren view'a yönlendir
		 return view('pages.dashboard.service.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('pages.dashboard.service.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		return view('pages.dashboard.service.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
	public function accepted($id)
{
    // İlgili teklifi bulun
    $offer = Offer::findOrFail($id);

    // İlgili teklifin bağlı olduğu requestInfo kaydını bulun
    $requestInfo = RequestInfo::findOrFail($offer->request_id);

    // İşveren (employer) ve serbest çalışan (freelancer) kullanıcı id'lerini alın
    $employerId = $requestInfo->user_id;
    $freelancerId = auth()->user()->id;

    // İşveren ve serbest çalışanın kullanıcı bilgilerini alın
    $employer = User::findOrFail($employerId);
    $freelancer = User::findOrFail($freelancerId);

    // Teklifi kabul etmek için 'active' değerini true, 'order_status' değerini false, 'delivery_status' değerini true yapın
    $offer->update([
        'active' => true,
        'order_status' => false,
        'delivery_status' => true,
    ]);

    // İşverenin bakiyesini güncelle (azalt)
    $employer->update([
        'wallet' => $employer->wallet - $offer->offer_price,
    ]);

    // Serbest çalışanın bakiyesini güncelle (artır)
    $freelancer->update([
        'wallet' => $freelancer->wallet + $offer->offer_price,
    ]);

    // Başka bir sayfaya yönlendirin veya başka bir işlem yapın
    return redirect()->route('member.service.index')->with('success', 'Offer accepted successfully!');
}

}
