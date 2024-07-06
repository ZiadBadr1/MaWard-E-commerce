<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\User;

class ClientController extends Controller
{

    public function index()
    {
        $clients = User::paginate(10);
        return view('admin.clients.index', [
            'clients' => $clients
        ]);
    }

    public function show(User $client)
    {
        $client->load('orders');
//        dd($user);

        $totalOrders = $client->orders->count();
        $totalSpent = $client->orders->sum('total_amount');
        $averageOrderValue = $totalOrders > 0 ? $totalSpent / $totalOrders : 0;

        return view('admin.clients.show', [
            'user' => $client,
            'totalOrders' => $totalOrders,
            'totalSpent' => $totalSpent,
            'averageOrderValue' => $averageOrderValue,
        ]);
    }



}
