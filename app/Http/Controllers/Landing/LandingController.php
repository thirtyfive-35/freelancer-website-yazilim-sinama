<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestInfo;
use App\Models\Offer;


class LandingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		 return view('pages.landing.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	

	 public function store(Request $request, $id)
	 {
		 $validatedData = $request->validate([
			 'offer_price' => 'required|numeric',
		 ]);
	 
		 // İlgili request_info'yu bulun
		 $requestInfo = RequestInfo::find($id);
	 
		 if (!$requestInfo) {
			 // Belirtilen detay ID'sine sahip request_info bulunamazsa bir şey yapın (örneğin, hata mesajı gönderin)
			 return redirect()->back()->with('error', 'Request Info not found!');
		 }
	 
			 $userId = auth()->user()->id;
	 
			 // Offer tablosuna kaydedin
			 Offer::create([
				 'request_id' => $id,
				 'user_id' => $userId,
				 'offer_price' => $validatedData['offer_price'],
			 ]);
	 
			 // Diğer işlemleri yapın (örneğin, başka bir sayfaya yönlendirme)
			 return redirect()->route('explore.landing')->with('success', 'Offer created successfully!');
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
		//
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


	// custom
	public function explore()
	{
		$allServices = RequestInfo::all();
		return view('components.landing.service-explore', compact('allServices'));

	}

	public function detail($id)
	{
		$service = RequestInfo::findOrFail($id);
		return view('pages.landing.detail',compact('service'));
	}

	public function booking($id)
	{
	}

	public function detail_booking($id)
	{
	}
}
