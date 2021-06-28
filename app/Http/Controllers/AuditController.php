<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller {
    public function index(Request $request) {
        $timeStart = $request->timeStart ?? '';
        $timeEnd = $request->timeEnd ?? '';
        $auditQuery = Audit::query();
        if (!empty($timeStart)) $auditQuery = $auditQuery->where('time', '>', $timeStart);
        if (!empty($timeEnd)) $auditQuery = $auditQuery->where('time', '<', $timeEnd);
        $audits = $auditQuery->orderBy('time', 'desc')->limit(200)->get();
        return view('audit.list', compact('audits', 'timeStart', 'timeEnd'));
    }
}
