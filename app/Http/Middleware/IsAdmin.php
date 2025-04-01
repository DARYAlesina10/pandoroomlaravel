<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Проверка, является ли пользователь администратором
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        
        // Если не администратор, перенаправление на ошибку или на главную
        return redirect('/')->with('error', 'У вас нет прав доступа к этой странице.');
    }
}