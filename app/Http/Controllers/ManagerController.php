<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller {
    /**
     * List all managers.
     *
     * @return Response
     */
    public function index() {
        $managers = Manager::all();
        return view('manager.list', compact('managers'));
    }

    /**
     * Add a manager.
     *
     * @return Response
     */
    public function create() {
        return view('manager.add');
    }

    /**
     * Save a manager.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        $request->validate([
            'employee' => 'required|exists:employee,personalId|max:191',
            'password' => 'required|min:8|max:191',
            'admin' => 'nullable|boolean',
        ]);
        $makarons = new Manager();
        $makarons->employee = $request->employee;
        $makarons->password = Hash::make($request->password);
        $makarons->save();
        return redirect(route('managers.index'));
    }

    /**
     * Destroy a manager.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        Manager::findOrFail($id)->delete();
        return $this->index();
    }
}
