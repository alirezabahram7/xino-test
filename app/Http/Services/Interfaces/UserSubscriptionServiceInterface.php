<?php

namespace App\Http\Services\Interfaces;

use App\Models\User;

interface UserSubscriptionServiceInterface
{
    public function subscribe(User $user, int $subscriptionId);

    public function renew(User $user);
}
