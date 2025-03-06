<?php

namespace App\Filament\Patient\Pages;

use App\Models\Speciality;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class PatientAppointmentPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';
    protected static ?string $slug = 'appointment/create';
    protected static ?string $title = 'Appointments';
    protected static string $view = 'filament.patient.pages.patient-appointment-page';

    /*
        'patient_id',
        'doctor_id',
        'specialty_id',
        'status',
        'date_time',
        'method',
        'payment_status',
        'google_event_id',
        'zoom_meeting_link'
     */

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('speciality_id')
                ->label(__('Speciality'))
                ->required()
                ->options(Speciality::pluck('name', 'id'))
                ->preload()
                ->searchable()
                ->live()
                ->afterStateUpdated(fn (callable $set) => $set('doctor_id', null)),

            Forms\Components\Select::make('doctor_id')
                ->label(__('Doctor'))
                ->required()
                ->options(function (Forms\Get $get) {
                    $specialityId = $get('speciality_id');

                    if (!$specialityId) {
                        return [];
                    }

                    return User::query()
                        ->whereHas('specialities', function ($query) use ($specialityId) {
                            $query->where('speciality_id', $specialityId);
                        })
                        ->pluck('name', 'id');
                })
                ->searchable()
                ->preload()
                ->disabled(fn (Forms\Get $get) => !$get('speciality_id'))
                ->live(),
        ]);
    }
}
