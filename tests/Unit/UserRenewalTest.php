<?php

use App\Models\Subscription;
use App\Models\User;

class UserRenewalTest
{
    public function test_user_can_renew_subscription()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/webhook/users/subscription-renewal', [
            'user_id' => $user->id,
        ]);

        $response->assertStatus(200);
    }
}
