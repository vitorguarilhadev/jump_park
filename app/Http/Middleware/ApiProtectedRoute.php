<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiProtectedRoute extends BaseMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'Não autorizado: O Token está expirado'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'Não autorizado: O Token é inválido'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Não autorizado: Token não fornecido'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Não autorizado'], 401);
        }

        return $next($request);
    }
}
