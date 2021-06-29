<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClientController extends Controller
{
    public function __construct() {
        $this->middleware('auth:manager', ['except' => ['show', 'edit', 'update']]);
    }

    /**
     * Show a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id ?? '';
        $firstName = $request->firstName ?? '';
        $lastName = $request->lastName ?? '';
        $clients = Client::query()
        ->where('id','LIKE','%'.$id.'%')
        ->where('firstName','LIKE','%'.$firstName.'%')
        ->where('lastName','LIKE','%'.$lastName.'%')
        ->get();
        return view('clients.list', compact('clients', 'id', 'firstName', 'lastName'));
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
            'registerDate' => 'nullable|time',
            'email' => 'required|email|unique:client|max:191',
            'password' => 'required|min:8|max:191',
            'phoneNumber' => 'required|unique:client|max:191',
        ]);
        $client = new Client();
        $client->firstName = $request->firstName;
        $client->lastName = $request->lastName;
        if ($request->registerDate !== null) $client->registerDate = $request->registerDate;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->phoneNumber = $request->phoneNumber;
        $client->save();
        Audit::create('create-client', $request, null, $client->id);
        return redirect(route('clients.show', $client->id));
    }

    /**
     * Display a client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::guard('manager')->check()) {
            if ($id != Auth::user()->id) {
                throw new NotFoundHttpException();
            }
        }
        $client = Client::findOrFail($id);
        return view('clients.info', compact('client'));
    }

    /**
     * Edit a client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::guard('manager')->check()) {
            if ($id != Auth::user()->id) {
                throw new NotFoundHttpException();
            }
        }
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
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
        if (!Auth::guard('manager')->check()) {
            if ($id != Auth::user()->id) {
                throw new NotFoundHttpException();
            }
        }

        $client = Client::findOrFail($id);
        $validated = $request->validate([
            'firstName' => 'required|max:191',
            'lastName' => 'required|max:191',
            'registerDate' => 'nullable|time',
            'email' => ['required', 'email', 'max:191', Rule::unique('client', 'email')->ignore($client->email, 'email')],
            'phoneNumber' => ['required', 'max:191', Rule::unique('client', 'phoneNumber')->ignore($client->phoneNumber, 'phoneNumber')],
        ]);
        $client->firstName = $request->firstName;
        $client->lastName = $request->lastName;
        if ($request->registerDate !== null) $client->registerDate = $request->registerDate;
        $client->email = $request->email;
        $client->phoneNumber = $request->phoneNumber;
        $client->save();
        Audit::create('update-client', $request, null, $client->id);
        return redirect(route('clients.show', $client->id));
    }

    /**
     * Destroy a client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Audit::create('destroy-client', $request, null, $id);
        Client::findOrFail($id)->delete();
        return redirect(route('clients.index'));
    }
}
