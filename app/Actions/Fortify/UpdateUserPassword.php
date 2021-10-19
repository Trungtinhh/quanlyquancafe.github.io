<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Rules\Password;
class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'current_password' => ['string'],
            'password' => ['string', new Password],
            'password_confirmation' => ['string'],
        ])->after(function ($validator) use ($user, $input) {
            if (isset($input['current_password']) && ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('Mật khẩu không đúng!'));
            }
            if (isset($input['password']) && ($input['password'] != $input['password_confirmation'])) {
                $validator->errors()->add('password', __('Mật khẩu xác nhận không khớp!'));
            }
            if (empty($input['current_password'])) {
                $validator->errors()->add('current_password', __('Mật khẩu mới không được trống!'));
            }
            if (empty($input['password'])) {
                $validator->errors()->add('password', __('Mật khẩu mới không được trống!'));
            }
            if (empty($input['password_confirmation'])) {
                $validator->errors()->add('password_confirmation', __('Mật khẩu xác nhận lại không được trống!'));
            }
        })->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
