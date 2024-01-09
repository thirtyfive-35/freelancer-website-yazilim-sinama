<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\RequestInfo;
use App\Models\ReputationInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		 // Kullanıcının tüm hizmetlerini çek
		 $services = RequestInfo::where('user_id', auth()->user()->id)->get();

		 // Hizmetleri gösteren view'a yönlendir
		 return view('pages.dashboard.request.index', compact('services'));
		//return view('pages.dashboard.request.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('pages.dashboard.request.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	// app/Http/Controllers/YourController.php

// app/Http/Controllers/YourController.php

public function store(Request $request)
{
    $data = $request->validate([
		'price' => 'required|numeric|min:0',
		'hizmet_title' => 'required|string',
		'delivery_date' => 'required|string',
		'hizmet_describe' => 'required|string',
		//'freelancer_keyword' => 'required|string', // Dizinin doğrulama kuralı
		'hizmet_not' => 'required|string',
		'hizmet_sistem'=> 'required|string',
	]);
	
	// Veritabanına kayıt işlemleri
	$service = new RequestInfo();
	$service->user_id = auth()->user()->id; // Authenticated kullanıcının ID'sini alır
	$service->price = $data['price'];
	$service->hizmet_title = $data['hizmet_title'];
	$service->delivery_date = $data['delivery_date'];
	$service->hizmet_describe = $data['hizmet_describe'];
	//$service->freelancer_keywords = $data['freelancer_keyword']; // Diziyi birleştir
	$service->hizmet_not = $data['hizmet_not'];
	$service->hizmet_sistem = $data['hizmet_sistem'];

	$service->save();


    return redirect()->route('member.request.index')
        ->with('success', 'Service created successfully');
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
		return view('pages.dashboard.request.edit');
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
	public function approve($id)
	{
	}





	public function reputation(){

		return view('pages.dashboard.request.reputation');
	}

	public function reputation_store(Request $request){
		
    $data = $request->validate([
		'reputation_price' => 'required|numeric|min:0',
		'reputation_title' => 'required|string',
		'target_username'=> 'required|string',
		'delivery_date' => 'required|string',
	]);
	
	// Veritabanına kayıt işlemleri
	$service = new ReputationInfo();
	$service->user_id = auth()->user()->id; // Authenticated kullanıcının ID'sini alır
	$service->reputation_price = $data['reputation_price'];
	$service->target_username = $data['target_username'];
	$service->reputation_title = $data['reputation_title'];
	$service->delivery_date = $data['delivery_date'];

	$service->save();


    return redirect()->route('member.request.index')
        ->with('success', 'Service created successfully');
	}







}
