<?php

namespace App\Http\Controllers\Concerns;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

trait HandlesCustomerAccounts
{
    protected function normalizePhone(?string $phone): string
    {
        if ($phone === null) {
            return '';
        }

        $digits = preg_replace('/\D+/', '', $phone);

        if (!$digits) {
            return '';
        }

        if (strlen($digits) === 10) {
            $digits = '7' . $digits;
        }

        if ($digits[0] === '8' && strlen($digits) === 11) {
            $digits = '7' . substr($digits, 1);
        }

        if ($digits[0] !== '7' && strlen($digits) === 11) {
            $digits = '7' . substr($digits, -10);
        }

        return '+' . $digits;
    }

    protected function generateGuestEmail(string $normalizedPhone): string
    {
        $digits = preg_replace('/\D+/', '', $normalizedPhone);

        if (!$digits) {
            $digits = Str::random(10);
        }

        return sprintf('guest.%s@pandoroom.local', $digits);
    }

    protected function resolveCustomer(
        string $name,
        string $normalizedPhone,
        ?string $password,
        bool $requirePassword = false,
        string $errorField = 'customer_phone'
    ): User {
        $user = User::where('phone', $normalizedPhone)->lockForUpdate()->first();

        if ($user) {
            if ($requirePassword) {
                if (!$password || !$user->password || !Hash::check($password, $user->password)) {
                    throw ValidationException::withMessages([
                        $errorField => 'Пользователь с таким номером уже существует. Укажите корректный пароль или выберите другой телефон.',
                    ]);
                }
            }

            if ($user->name !== $name) {
                $user->forceFill(['name' => $name])->save();
            }

            if ($user->phone !== $normalizedPhone) {
                $user->forceFill(['phone' => $normalizedPhone])->save();
            }

            return $user;
        }

        $passwordToStore = $password;

        if (!$passwordToStore) {
            if ($requirePassword) {
                throw ValidationException::withMessages([
                    $errorField => 'Необходимо указать пароль для существующего пользователя.',
                ]);
            }

            $passwordToStore = Str::random(12);
        }

        return User::create([
            'name' => $name,
            'email' => $this->generateGuestEmail($normalizedPhone),
            'phone' => $normalizedPhone,
            'password' => Hash::make($passwordToStore),
            'role' => 'user',
        ]);
    }
}
