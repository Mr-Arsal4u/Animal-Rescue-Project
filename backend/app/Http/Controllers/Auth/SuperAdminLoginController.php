<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SuperAdminLoginController extends Controller
{
    /**
     * Handle an incoming superadmin authentication request.
     */
    public function store(LoginRequest $request): Response
    {
        $request->authenticate();

        // Check if the authenticated user is a superadmin
        $user = Auth::user();
        if (!$user->isSuperAdmin()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            throw ValidationException::withMessages([
                'email' => 'Access denied. Superadmin privileges required.',
            ]);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'Superadmin login successful',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
} 