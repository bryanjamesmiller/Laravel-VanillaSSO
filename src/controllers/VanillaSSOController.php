<?php
/**
 * This file is part of Laravel-VanillaSSO for jsConnect
 * @author pdefreitas <pdefreitas@users.noreply.github.com>
 * @license GPLv2
 */

class VanillaSSOController extends \BaseController
{

    /**
     * Produces jsonResponse.
     *
     * @return Response
     */
    public function jsonResponse()
    {
        $user = Auth::getUser();

        //Change here whatever you need
        $ssoUser = new SSOUser();
        $ssoUser->id = $user->id;
        $ssoUser->name = $user->username;
        $ssoUser->email = $user->email;
        $ssoUser->roles = $user->roles;
        $ssoUser->profilepicture = "";

        $userInfo = $ssoUser->toArray();

        return VanillaSSO::WriteJsConnect($userInfo, $_GET, true);
    }

}
