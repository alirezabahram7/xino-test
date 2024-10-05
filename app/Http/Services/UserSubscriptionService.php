<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\UserSubscriptionServiceInterface;
use App\Models\User;
use App\Repositories\Interfaces\InvoiceRepositoryInterface;
use App\Repositories\Interfaces\SubscriptionRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserSubscriptionService implements UserSubscriptionServiceInterface
{
    private SubscriptionRepositoryInterface $subscriptionRepository;
    private InvoiceRepositoryInterface $invoiceRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        SubscriptionRepositoryInterface $subscriptionRepository,
        InvoiceRepositoryInterface $invoiceRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->userRepository = $userRepository;
    }

    public function subscribe(User $user, int $subscriptionId)
    {
        // Get the subscription
        $subscription = $this->subscriptionRepository->get($subscriptionId);

        // Attach the subscription to the user
        $this->userRepository->update([
            'subscription_id' => $subscription->id,
            'subscription_expired_at' => now()->addMonth(),
        ], $user);


        // Generate an invoice
        $this->invoiceRepository->create([
            'user_id' => $user->id,
            'amount' => $subscription->price,
            'status' => 'pending', // for mock purposes
        ]);
    }

    public function renew(User $user)
    {
        $this->userRepository->update([
            'subscription_expired_at' => now()->addMonth(),
        ], $user);

        $this->invoiceRepository->create([
            'user_id' => $user->id,
            'amount' => $user->subscription->price,
            'status' => 'pending', // Simulating the payment status
        ]);
    }
}
