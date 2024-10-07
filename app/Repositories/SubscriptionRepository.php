<?php

namespace App\Repositories;

use App\Models\Subscription;
use App\Repositories\Interfaces\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{

    public function get(int $subscriptionId)
    {
        return Subscription::find($subscriptionId);
    }
}
