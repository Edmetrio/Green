<?php

namespace App\Http\Middleware;

use App\Models\Models\permissao;
use App\Models\Models\role;
use App\Models\Models\rota;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class EnsureUserRoleIsAllowedToAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userRole = Auth()->user()->role_id;
        $route = Route::currentRouteName();
        $rota = rota::where('nome', $route)->first();
        try {
            if (
                permissao::isRoleHasRightToAccess($userRole, $rota->id)
                || in_array($route, $this->userAccessRole()[$userRole])) {
                return $next($request);
            } else {
                abort(403, 'Não Autorizado!');
            }
        } catch (\Throwable $th) {
            abort(403, 'Você não esta autorizador a aceder essa página!');
        }
    }

    private function userAccessRole()
    {
        $admin = role::where('nome', 'Dev')->first();
        
        return [
            $admin->id => [
                'propriedade',
                'detalhes',
                'foto',
                'tipo',
                'noticia',
                'provincia',
                'distrito',
                'agentes',
                'rota',
                'permissao',
                'role'
            ],
        ];
    }
}
