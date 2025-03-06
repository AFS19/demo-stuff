<?php

namespace App\Filament\Admin\Resources;

use App\Enums\AppointmentMethodEnum;
use App\Enums\AppointmentPaymentStatusEnum;
use App\Enums\AppointmentStatusEnum;
use App\Filament\Admin\Resources\AppointmentResource\Pages;
use App\Filament\Admin\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('patient_id')
                    ->label(__('Patient'))
                    ->relationship('patient', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),

                Forms\Components\Select::make('doctor_id')
                    ->label(__('Doctor'))
                    ->relationship('doctor', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),

                Forms\Components\Select::make('speciality_id')
                    ->label(__('Speciality'))
                    ->relationship('speciality', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),

                Forms\Components\Select::make('status')
                    ->label(__('Status'))
                    ->required()
                    ->options(AppointmentStatusEnum::class),

                Forms\Components\DateTimePicker::make('date_time')
                    ->label(__('Date Time'))
                    ->native(false)
                    ->required(),

                Forms\Components\Select::make('method')
                    ->label(__('Method'))
                    ->options(AppointmentMethodEnum::class)
                    ->required(),

                Forms\Components\Select::make('payment_status')
                    ->label(__('Payment Status'))
                    ->options(AppointmentPaymentStatusEnum::class)
                    ->required(),

                Forms\Components\TextInput::make('google_event_id')
                    ->maxLength(255),

                Forms\Components\TextInput::make('zoom_meeting_link')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('doctor_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('speciality_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('google_event_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zoom_meeting_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
