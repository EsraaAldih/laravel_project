<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class VerificationApiController extends Controller
{
    /**
* Mark the authenticated user's email address as verified.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function verify(Request $request) {
    $userID = $request['id'];
    $user = Student::findOrFail($userID);
    $date = date("Y-m-d g:i:s");
    $user->email_verified_at = $date; // to enable the "email_verified_at field of that user be a current time stamp by mimicing the must verify email feature
    $user->save();
    return response()->json('Email verified!');
    }
    /**
    * Resend the email verification notification.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function resend(Request $request)
    {
    if ($request->student()->hasVerifiedEmail()) {
    return response()->json('User already have verified email!', 422);
    }
    $request->student()->sendEmailVerificationNotification();
    return response()->json('The notification has been resubmitted');
    }

}
