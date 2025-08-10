<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultationResource\Pages;
use App\Filament\Resources\ConsultationResource\RelationManagers;
use App\Models\Consultation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Section;

class ConsultationResource extends Resource
{
    protected static ?string $model = Consultation::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    
    protected static ?string $navigationGroup = 'Requests Management';
    
    protected static ?string $navigationLabel = 'Consultations';
    
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Client Information')
                    ->schema([
                        TextInput::make('client_name')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('client_email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('client_phone')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        
                        TextInput::make('emergency_contact')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
                
                Section::make('Pet Information')
                    ->schema([
                        TextInput::make('pet_name')
                            ->required()
                            ->maxLength(255),
                        
                        Select::make('pet_type')
                            ->required()
                            ->options([
                                'dog' => 'Dog',
                                'cat' => 'Cat',
                                'bird' => 'Bird',
                                'rabbit' => 'Rabbit',
                                'hamster' => 'Hamster',
                                'fish' => 'Fish',
                                'guinea_pig' => 'Guinea Pig',
                                'ferret' => 'Ferret',
                                'other' => 'Other',
                            ]),
                        
                        TextInput::make('pet_breed')
                            ->required()
                            ->maxLength(100),
                        
                        TextInput::make('pet_age')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->maxValue(30),
                    ])->columns(2),
                
                Section::make('Consultation Details')
                    ->schema([
                        Select::make('consultation_type')
                            ->required()
                            ->options([
                                'general_checkup' => 'General Checkup',
                                'vaccination' => 'Vaccination',
                                'surgery' => 'Surgery',
                                'emergency' => 'Emergency',
                                'dental' => 'Dental Care',
                                'grooming' => 'Grooming',
                                'behavioral' => 'Behavioral Issues',
                                'nutrition' => 'Nutrition Consultation',
                                'other' => 'Other',
                            ]),
                        
                        Textarea::make('symptoms_description')
                            ->required()
                            ->rows(4)
                            ->maxLength(1000),
                        
                        DatePicker::make('preferred_date')
                            ->required()
                            ->minDate(now()),
                        
                        TextInput::make('preferred_time')
                            ->required()
                            ->maxLength(100),
                        
                        Textarea::make('additional_notes')
                            ->rows(3)
                            ->maxLength(500),
                    ])->columns(2),
                
                Section::make('Status')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'confirmed' => 'Confirmed',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('pending')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client_name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                TextColumn::make('pet_name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('pet_type')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                
                TextColumn::make('consultation_type')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                
                TextColumn::make('preferred_date')
                    ->date()
                    ->sortable(),
                
                TextColumn::make('preferred_time')
                    ->searchable(),
                
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'confirmed',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ]),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                
                SelectFilter::make('pet_type')
                    ->options([
                        'dog' => 'Dog',
                        'cat' => 'Cat',
                        'bird' => 'Bird',
                        'rabbit' => 'Rabbit',
                        'hamster' => 'Hamster',
                        'fish' => 'Fish',
                        'guinea_pig' => 'Guinea Pig',
                        'ferret' => 'Ferret',
                        'other' => 'Other',
                    ]),
                
                SelectFilter::make('consultation_type')
                    ->options([
                        'general_checkup' => 'General Checkup',
                        'vaccination' => 'Vaccination',
                        'surgery' => 'Surgery',
                        'emergency' => 'Emergency',
                        'dental' => 'Dental Care',
                        'grooming' => 'Grooming',
                        'behavioral' => 'Behavioral Issues',
                        'nutrition' => 'Nutrition Consultation',
                        'other' => 'Other',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListConsultations::route('/'),
            'create' => Pages\CreateConsultation::route('/create'),
            'edit' => Pages\EditConsultation::route('/{record}/edit'),
        ];
    }
}
