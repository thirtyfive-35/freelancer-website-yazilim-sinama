<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\RequestInfo;
use Illuminate\Support\Facades\DB;

class MyOrderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

public function index()
{
    // Giriş yapan kullanıcının id'sini al
    $userId = auth()->user()->id;

    // Giriş yapan kullanıcının user_id'sine sahip tüm RequestInfo kayıtlarını al
    $requestInfos = RequestInfo::where('user_id', $userId)->get();

    // RequestInfo kayıtlarının id değerlerini al
    $requestInfoIds = $requestInfos->pluck('id');

    // RequestInfo kayıtlarının id değerlerine sahip Offer kayıtlarını al
    $services = Offer::whereIn('request_id', $requestInfoIds)
        ->where('active', 1)
        ->groupBy('request_id')
        ->select('request_id', DB::raw('MAX(offer_price) as max_offer_price'))
        ->get();

    // Elde edilen tekliflerle ilgili RequestInfo ve Offer kayıtlarını al
    $services = Offer::whereIn('request_id', $services->pluck('request_id'))
        ->where('offer_price', function ($query) {
            $query->select('max_offer_price')
                ->fromSub(function ($query) {
                    $query->from('offers')
                        ->selectRaw('MAX(offer_price) as max_offer_price')
                        ->groupBy('request_id');
                }, 'max_offer_prices')
                ->whereColumn('offer_price', 'max_offer_price');
        })
		->where('active', 1)
        ->get();

    // Hizmetleri gösteren view'a yönlendir
    return view('pages.dashboard.order.index', compact('services'));
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


	public function accepted($id)
    {
        // İlgili teklifi bulun
        $offer = Offer::findOrFail($id);

        // Eğer teklif bulunamazsa, hata mesajı gönderin
        if (!$offer) {
            return redirect()->back()->with('error', 'Offer not found!');
        }

        // Teklifi kabul etmek için 'active' değerini true yapın
        $offer->update([
            'active' => false,
			'order_status' => true,	
        ]);

        // Başka bir sayfaya yönlendirin veya başka bir işlem yapın
        return redirect()->route('member.order.index')->with('success', 'Offer accepted successfully!');
    }

    /**
     * Teklifi reddetme işlemi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejected($id)
    {
        // İlgili teklifi bulun
        $offer = Offer::findOrFail($id);

        // Eğer teklif bulunamazsa, hata mesajı gönderin
        if (!$offer) {
            return redirect()->back()->with('error', 'Offer not found!');
        }

        // Teklifi reddetmek için teklifi silin
        $offer->delete();

        // Başka bir sayfaya yönlendirin veya başka bir işlem yapın
        return redirect()->route('member.order.index')->with('success', 'Offer rejected successfully!');
    }
}
