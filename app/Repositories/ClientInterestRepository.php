<?php

namespace App\Repositories;

use App\Models\ClientInterest;
use App\Models\User;
use App\Repositories\InterestRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ClientInterestRepository 
{
    private InterestRepository $interest_repo;

    public function __construct(InterestRepository $interest_repo) {
        $this->interest_repo = $interest_repo;
    }
    public function getClientInterests($client_id) {
        return ClientInterest::where('user_id', $client_id)->get();
    }

    public function createClientInterests($client, $interests) {
        $clientInterests = $client->interests()->get();
        $clientInterestsIds = array_map(function($i) { return $i['interest_id']; }, $clientInterests->toArray());

        $newInterests = [];
        $interestsToDelete = array_diff($clientInterestsIds, $interests);

        foreach (array_unique($interests) as $interest) {
            if (!in_array($interest, $clientInterestsIds)) {
                if ($this->interest_repo->getInterest($interest) === null) {
                    continue;
                }

                $clientInterest = new ClientInterest;
                $clientInterest->interest_id = $interest;

                array_push($newInterests, $clientInterest);
            }
        }
        
        DB::transaction(function() use ($client, $newInterests, $interestsToDelete) {
            $client->interests()->saveMany($newInterests);
            $client->interests()->whereIn('interest_id', $interestsToDelete)->delete();
        });
    }
}