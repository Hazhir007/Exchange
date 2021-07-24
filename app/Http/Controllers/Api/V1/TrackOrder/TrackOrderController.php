<?php


namespace App\Http\Controllers\Api\V1\TrackOrder;


use App\Http\Controllers\Controller;

use App\Http\Resources\Order\TrackOrderResource;
use App\Repositories\OrderRepository\OrderRepositoryInterface;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    public function __invoke(OrderRepositoryInterface $orderRepository, Request $request)
    {
        $order = $orderRepository->findOrder($request->tracking_code);
        if ($order) {
            return $this->JsonResponseSuccess('you order is submitted', 200, new TrackOrderResource($order));
        }

        return $this->JsonResponseError('you order is not submitted or your tracking code is wrong');
    }
}
