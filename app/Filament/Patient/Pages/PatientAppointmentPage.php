<?php

namespace App\Filament\Patient\Pages;

use App\Models\Speciality;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Enums\MaxWidth;

class PatientAppointmentPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';
    protected static ?string $slug = 'appointment/create';
    protected static ?string $title = 'Appointments';
    protected static string $view = 'filament.patient.pages.patient-appointment-page';

    public $data = [];

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Prose;
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('speciality_id')
                ->label(__('Speciality'))
                ->required()
                ->options(Speciality::pluck('name', 'id'))
                ->preload()
                ->searchable(),

            Forms\Components\Select::make('doctor_id')
                ->label(__('Doctor'))
                ->required()
                ->options(User::doctors()->pluck('name', 'id'))
                ->searchable()
                ->preload(),
        ])->statePath($this->data);
    }
}
