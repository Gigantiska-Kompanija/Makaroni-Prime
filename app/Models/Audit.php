<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Audit extends Model {
    use HasFactory;

    protected $table = 'audit_log';

    public static function create(string $type, Request $req, string $email = null) {
        if (!isset($email)) {
            if (Auth::guard('manager')->check()) {
                $email = Auth::guard('manager')->user()->employee()->first()->email;
            } elseif (Auth::check()) {
                $email = Auth::user()->email;
            }
        }
        Audit::insert([
            'type' => $type,
            'ip' => $req->ip(),
            'email' => $email,
            'time' => now(),
        ]);
    }
}
