<?php


// app/Http/Controllers/Reputation/ReputationController.php

namespace App\Http\Controllers\Reputation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReputationInfo;
use App\Models\ReputationIndex;
use App\Models\User;




class ReputationController extends Controller
{
    public function index()
    {
        $reputations = ReputationInfo::all();
        return view('pages.reputation.index', compact('reputations'));
    }


    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function taking($id)
	{
		
		$service = ReputationInfo::findOrFail($id);
		return view('pages.reputation.taking',compact('service'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	
	 public function store(Request $request, $id)
{
    // Gelen form verilerini doğrula
    $request->validate([
        'client_username' => 'required',
    ]);

    // Gelen form verilerini al
    $user_id = auth()->id();
    $client_username = $request->input('client_username');

    // "reputation_infos" tablosundan ilgili kaydı al
    $reputationInfo = ReputationInfo::findOrFail($id);

    // Eğer kullanıcılar eşit değilse ve aynı "target_and_client_username" değerine sahip kayıt var mı kontrol et
    if ($reputationInfo->user_id != $user_id) {
        $existingReputation = ReputationIndex::where('target_and_client_username', $reputationInfo->target_username . ';' . $client_username)->first();

        // Eğer böyle bir kayıt yoksa yeni kaydı oluştur
        if (!$existingReputation) {
            // Veritabanına kaydet
            $reputation = new ReputationIndex();
            $reputation->client_user_id = $user_id;
            $reputation->target_user_id = $reputationInfo->user_id; // "reputation_infos" tablosundan alınan değer
            $reputation->target_and_client_username = $reputationInfo->target_username . ';' . $client_username; // Birleştirilmiş değer
            $reputation->limit_price = $reputationInfo->reputation_price;
            
            // Diğer sütunları ekleyin
            $reputation->save();

            $githubAccessToken = "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";
            $isFollowing = $this->checkFollowing($reputationInfo->target_username, $client_username, $githubAccessToken);

            // GitHub takip durumuna göre kullanıcı kayıtlarını güncelle
            $clientUser = User::find($user_id);
            $targetUser = User::find($reputationInfo->user_id);

            if ($isFollowing) {
                $clientUser->wallet += 2;
                $targetUser->wallet -= 2;
            }

            $clientUser->save();
            $targetUser->save();

            // Başarıyla kaydedildiğini bildiren bir mesaj ile sayfaya yönlendir
            return redirect()->route('reputations.index')->with('success', 'Reputation successfully added');

        }
         else {
            // Aynı değere sahip bir kayıt varsa hata mesajı ile sayfaya yönlendir
            return redirect()->route('reputations.index')->with('error', 'The reputation with the same target_and_client_username already exists.');
        }
    } else {
        // Kullanıcılar eşitse hata mesajı ile sayfaya yönlendir
        return redirect()->route('reputations.index')->with('error', 'Client user and target user cannot be the same.');
    }
}


public function checkFollowing($username, $targetUser, $accessToken)
    {
        $url = "https://api.github.com/users/{$username}/following/{$targetUser}";

        $headers = [
            "Authorization: token {$accessToken}",
            "User-Agent: YourAppName",
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CAINFO, "C:\Users\batur\Downloads\cacert.pem");

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($response === false) {
            return false; // Hata durumu
        } else {
            return $httpCode == 204; // 204 durumunda true, diğer durumlarda false
        }
    }



	



    
}
