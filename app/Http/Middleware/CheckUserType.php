<?php namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckUserType {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
    public function handle($request, Closure $next)
    {
        // Get the required roles from the route
        $user_type_needed = $this->getRequireUserTypeForRoute($request->route());
        $user_type = $request->user()->user_type;

        // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        if(in_array($user_type, $user_type_needed) || $user_type == "superadmin" )
        {
            return $next($request);
        }
        return response([
            'error' => [
                'code' => 'INSUFFICIENT_ROLE',
                'description' => 'You are not authorized to access this resource.'
            ]
        ], 401);
    }

    private function getRequireUserTypeForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['user_types']) ? $actions['user_types'] : null;
    }

}
