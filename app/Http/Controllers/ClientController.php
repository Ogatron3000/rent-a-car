<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Country;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $countries = Country::all();

        return view('clients.create', compact('countries'));
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->validated());

        return redirect($client->path());
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $countries = Country::all();

        return view('clients.edit', compact('client', 'countries'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect($client->path());
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect(route('clients.index'));
    }
}
