<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.list');
    }
    
    /**
     * Filter clients by name and surname.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
    }

    /**
     * Add a client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.add');
    }

    /**
     * Save a client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|max:191',
            'lastName' => 'required|max:191',
            'registerDate' => '',
            'email' => 'required|unique:client|max:191',
            'password' => 'required|min:8|max:191',
            'phoneNumber' => 'required|max:191',
        ]);
        $client = new Client();
        $client->firstName = $request->firstName;
        $client->lastName = $request->lastName;
        $client->registerDate = $request->registerDate;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->phoneNumber = $request->phoneNumber;
        $client->save();
        return view('clients.list');
    }
    
    /**
     * Display a client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('clients.info', compact('id'));
    }

    /**
     * Edit a client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('clients.edit', compact('id'));
    }

    /**
     * Save changes to client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'firstName' => 'required|max:191',
            'lastName' => 'required|max:191',
            'registerDate' => '',
            'email' => 'required|unique:client|max:191',
            'password' => 'required|min:8|max:191',
            'phoneNumber' => 'required|max:191',
        ]);
        $client = Client::findOrFail($id);
        $client->firstName = $request->firstName;
        $client->lastName = $request->lastName;
        $client->registerDate = $request->registerDate;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->phoneNumber = $request->phoneNumber;
        $client->save();
        return view('clients.info', compact('id'));
    }

    /**
     * Destroy a client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return view('clients.list');
    }
}
