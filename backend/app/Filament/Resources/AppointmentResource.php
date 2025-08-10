<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Medical Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Pet Information')
                    ->schema([
                        TextInput::make('pet_name')
                            ->required()
                            ->maxLength(255),
                        
                        Select::make('pet_type')
                            ->options([
                                'dog' => 'Dog',
                                'cat' => 'Cat',
                                'bird' => 'Bird',
                                'rabbit' => 'Rabbit',
                                'hamster' => 'Hamster',
                                'fish' => 'Fish',
                                'other' => 'Other',
                            ])
                            ->required(),
                        
                        TextInput::make('pet_breed')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('pet_age')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->suffix('years'),
                    ])->columns(2),

                Section::make('Owner Information')
                    ->schema([
                        TextInput::make('owner_name')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('owner_email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('owner_phone')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                    ])->columns(3),

                Section::make('Appointment Details')
                    ->schema([
                        DatePicker::make('appointment_date')
                            ->required()
                            ->minDate(now()),
                        
                        TimePicker::make('appointment_time')
                            ->required()
                            ->seconds(false),
                        
                        Select::make('service_type')
                            ->options([
                                'vaccination' => 'Vaccination',
                                'checkup' => 'Regular Checkup',
                                'emergency' => 'Emergency Care',
                                'surgery' => 'Surgery',
                                'dental' => 'Dental Care',
                                'grooming' => 'Grooming',
                                'consultation' => 'Consultation',
                                'other' => 'Other',
                            ])
                            ->required(),
                        
                        Select::make('doctor_id')
                            ->label('Doctor')
                            ->options(Doctor::active()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        
                        Select::make('urgency_level')
                            ->options([
                                1 => 'Low Priority',
                                2 => 'Normal Priority',
                                3 => 'High Priority',
                                4 => 'Urgent',
                                5 => 'Critical',
                            ])
                            ->required()
                            ->default(2),
                    ])->columns(2),

                Section::make('Additional Information')
                    ->schema([
                        Textarea::make('symptoms')
                            ->rows(3)
                            ->placeholder('Describe any symptoms or concerns'),
                        
                        Textarea::make('notes')
                            ->rows(3)
                            ->placeholder('Additional notes or special requirements'),
                        
                        TextInput::make('total_cost')
                            ->numeric()
                            ->prefix('$')
                            ->minValue(0),
                        
                        Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'partial' => 'Partial Payment',
                            ])
                            ->default('pending'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pet_name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('pet_type')
                    ->badge()
                    ->color('primary'),
                
                TextColumn::make('owner_name')
                    ->searchable(),
                
                TextColumn::make('appointment_date')
                    ->date()
                    ->sortable(),
                
                TextColumn::make('appointment_time')
                    ->time()
                    ->sortable(),
                
                TextColumn::make('service_type')
                    ->badge()
                    ->color('info'),
                
                TextColumn::make('doctor.name')
                    ->searchable(),
                
                BadgeColumn::make('urgency_level')
                    ->colors([
                        'danger' => 5,
                        'warning' => 4,
                        'info' => 3,
                        'success' => 2,
                        'gray' => 1,
                    ]),
                
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'confirmed',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ]),
                
                TextColumn::make('total_cost')
                    ->money('USD')
                    ->sortable(),
                
                BadgeColumn::make('payment_status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'paid',
                        'info' => 'partial',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                
                SelectFilter::make('service_type')
                    ->options([
                        'vaccination' => 'Vaccination',
                        'checkup' => 'Regular Checkup',
                        'emergency' => 'Emergency Care',
                        'surgery' => 'Surgery',
                        'dental' => 'Dental Care',
                        'grooming' => 'Grooming',
                        'consultation' => 'Consultation',
                        'other' => 'Other',
                    ]),
                
                SelectFilter::make('doctor_id')
                    ->label('Doctor')
                    ->options(Doctor::active()->pluck('name', 'id')),
                
                Filter::make('today')
                    ->query(fn (Builder $query): Builder => $query->today())
                    ->label('Today\'s Appointments'),
                
                Filter::make('upcoming')
                    ->query(fn (Builder $query): Builder => $query->upcoming())
                    ->label('Upcoming Appointments'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('confirm')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(fn (Appointment $record) => $record->update(['status' => 'confirmed']))
                    ->visible(fn (Appointment $record) => $record->status === 'pending'),
                Tables\Actions\Action::make('complete')
                    ->icon('heroicon-o-flag')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(fn (Appointment $record) => $record->update(['status' => 'completed']))
                    ->visible(fn (Appointment $record) => $record->status === 'confirmed'),
                Tables\Actions\DeleteAction::make(),
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
