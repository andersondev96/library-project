<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use App\Models\User_Permission;

class Helper
{
    public static function isAdministrator()
    {
        $userPermissions = User_Permission::orderBy('id')->get();
        $userId = Auth::user()->id;

        $permissionUserId = User_Permission::where('user_id', '=', $userId)->get();
        $permissionAdministrator = $permissionUserId->where('permission_id', '=', '1');

        if (count($permissionAdministrator) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
