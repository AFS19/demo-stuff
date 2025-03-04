<?php

namespace App\Filament\Auth;

use Filament\Facades\Filament;
use Filament\Pages\Auth\Register;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;

class CustomRegister extends Register
{
    protected function handleRegistration(array $data): Model
    {
        $currentPanel = Filament::getCurrentPanel();

        $user = $this->getUserModel()::create($data);

        // Assign role based on the panel ID
        switch ($currentPanel->getId()) {
            case 'admin':
                $user->assignRole('Admin');
                break;
            case 'doctor':
                $user->assignRole('Doctor');
                break;
            case 'patient':
                $user->assignRole('Patient');
                break;
            default:
                // Optionally assign a default role if no match is found
                $user->assignRole('Patient');
                break;
        }

        return $user;
    }
}
