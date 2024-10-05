<?php

use App\Models\Subscription;
use App\Models\User;

class UserSubscriptionTest
{
    public function test_user_can_subscribe()
    {
        $user = User::factory()->create();
        $subscription = Subscription::factory()->create();

        $response = $this->actingAs($user)->post('/api/users/subscribe', [
            'subscription_id' => $subscription->id,
        ]);

        $response->assertStatus(200);
    }

}
