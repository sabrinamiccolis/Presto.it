<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'terms_accepted' => ['required', 'accepted'],
            'name' => ['required', 'string', 'max:100', Rule::unique(User::class)],
            'birthday' => ['required', 'date'], 
            'city' => ['required', 'string', 'max:50'], 
            'prov' => ['required', 'string', 'max:4'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'terms_accepted' => isset($input['terms_accepted']) && $input['terms_accepted'] === 'on',
            'name' => $input['name'],
            'birthday' => $input['birthday'],
            'city' => $input['city'],
            'prov' => $input['prov'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
