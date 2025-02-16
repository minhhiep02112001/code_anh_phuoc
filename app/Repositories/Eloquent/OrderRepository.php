<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Contracts\OrderContracts;
use App\Repositories\Repository;

class OrderRepository extends Repository implements OrderContracts
{
    public function model()
    {
        return Order::class;
    }
}