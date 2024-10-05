<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRenewalRequest;
use App\Http\Requests\UserSubscriptionRequest;
use App\Http\Services\Interfaces\UserSubscriptionServiceInterface;
use App\Models\Subscription;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSubscriptionController extends Controller
{
    /**
     * @var UserSubscriptionServiceInterface
     */
    private UserSubscriptionServiceInterface $subscriptionService;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserSubscriptionServiceInterface $subscriptionService,
        UserRepositoryInterface $userRepository
    ) {
        $this->subscriptionService = $subscriptionService;
        $this->userRepository = $userRepository;
    }

    /**
     * @throws \Exception
     */
    public function subscribe(UserSubscriptionRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = auth()->user();
            $this->subscriptionService->subscribe($user, $request->subscription_id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage(), 400);
        }

        return response()->json(['message' => 'Subscription successful!'], 200);
    }

    /**
     * @throws \Exception
     */
    public function renew(SubscriptionRenewalRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->get($request->user_id);
            $this->subscriptionService->renew($user);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage(), 400);
        }

        return response()->json(['message' => 'Subscription renewed!'], 200);
    }

}
