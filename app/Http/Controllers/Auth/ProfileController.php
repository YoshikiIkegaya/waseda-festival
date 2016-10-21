<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class ProfileController extends Controller
{

    /**
     * get Edit user profile
     * @return view
     */
    public function index()
    {
        $profile = \Auth::user();
        $langPath = 'admin.user.attributes';
        return view('auth.edit', compact('profile', 'langPath'));
    }

    /**
     * Update profile users.
     * @param StoreUpdateRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(StoreUpdateRequest $request)
    {
        $userData = $request->only(['name', 'password']);
        try {
            if (empty($userData['password'])) {
                unset($userData['password']);
            }

            $profile = \Auth::user();
            $profile->update($userData);
            return redirect()->action('Auth\ProfileController@index')
                ->withSuccess(trans('message.user.update_profile_success'));

        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }

        return redirect()->back()->withInput()->withError(trans('message.user.update_error'));
    }

}
