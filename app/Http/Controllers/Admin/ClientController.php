<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientRequest;
use App\Http\Requests\Admin\UpdateClientRequest;
use App\Models\Client;
use App\Models\Country;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = request()->query()
            ? $this->search()
            : Client::with('country')->paginate(10);

        $countries = Country::all();

        return view('clients.index', compact('clients', 'countries'));
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

    protected function search()
    {
        return Client::where($this->makeQuery([
            'name:like',
            'country_id',
            'passport',
            'email',
            'phone',
            'first_reservation',
            'last_reservation',
        ]))->with('country')->paginate(10);
    }

    protected function makeQuery($values)
    {
        $res = [];

        foreach ($values as $value) {
            if ( ! request()->query($value)) {
                continue;
            }

            if (str_contains($value, ':')) {
                $res[] = [$value, 'like', '%' . request()->query($value) . '%',];
            } else {
                $res[] = [$value, '=', request()->query($value)];
            }

            return $res;
        }
    }
}
