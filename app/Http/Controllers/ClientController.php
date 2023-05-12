<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ClientStoreRequest;
use App\Http\Requests\Admin\ClientUpdateRequest;
use App\Models\Client;
use App\Traits\Upload;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use Upload;
    public function index()
    {
        $clients = Client::orderByDesc('id')->paginate(8);
        return view('Admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('Admin.clients.create');
    }

    public function store(ClientStoreRequest $request)
    {
        // request validation ==> ClientStoreRequest

        // upload photo
        $imgName = $this->uploadPhoto($request->file('image'), 'clients');

        // prepare data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imgName
        ];

        // insert data into db
        Client::create($data);
        $msg = "Client added successfully";
        return redirect()->back()->with('success', $msg);
    }

    public function edit(Client $client)
    {
        return view('Admin.clients.edit', compact('client'));
    }


    public function update(ClientUpdateRequest $request, Client $client)
    {
        // request validation ==> ClientStoreRequest

        if ($request->hasFile('image')) {
            // upload photo
            $imgName = $this->uploadPhoto($request->file('image'), 'clients');
        } else {
            $imgName = $client->image;
        }

        // prepare data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imgName
        ];

        $client->update($data);

        $msg = "Client updated successfully";
        return redirect()->back()->with('success', $msg);
    }

    public function destroy(Client $client)
    {
        // delete image from server
        if ($client->image) {
            if ($client->image !== 'default.png') {
                unlink(public_path("uploads/images/clients/$client->image"));
            }
        }
        $client->project()->delete();
        $client->delete();
        $msg = "Client deleted successfully";
        return redirect()->back()->with('success', $msg);
    }
}
