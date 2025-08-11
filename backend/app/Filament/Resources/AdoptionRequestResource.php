<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdoptionRequestResource\Pages;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class AdoptionRequestResource extends Resource
{
    protected static ?string $model = AdoptionRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationGroup = 'Adoption Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Animal Information')
                    ->schema([
                        Select::make('animal_id')
                            ->label('Animal')
                            ->options(Animal::available()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                    ]),

                Section::make('Adopter Information')
                    ->schema([
                        TextInput::make('adopter_name')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('adopter_email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('adopter_phone')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        
                        Textarea::make('adopter_address')
                            ->required()
                            ->rows(3),
                        
                        TextInput::make('adopter_age')
                            ->required()
                            ->numeric()
                            ->minValue(18)
                            ->maxValue(100)
                            ->suffix('years'),
                        
                        TextInput::make('adopter_occupation')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Adoption Details')
                    ->schema([
                        Toggle::make('adopter_experience')
                            ->label('Previous Pet Experience')
                            ->helperText('Has the adopter owned pets before?'),
                        
                        TextInput::make('adopter_family_size')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->suffix('members'),
                        
                        Select::make('adopter_housing_type')
                            ->options([
                                'apartment' => 'Apartment',
                                'house' => 'House',
                                'condo' => 'Condo',
                                'townhouse' => 'Townhouse',
                                'farm' => 'Farm',
                                'other' => 'Other',
                            ])
                            ->required(),
                        
                        Textarea::make('adopter_other_pets')
                            ->rows(2)
                            ->placeholder('List any other pets currently owned'),
                        
                        Textarea::make('adopter_reason')
                            ->required()
                            ->rows(3)
                            ->placeholder('Why do you want to adopt this animal?'),
                        
                        Textarea::make('adopter_commitment')
                            ->required()
                            ->rows(3)
                            ->placeholder('How do you plan to care for this animal?'),
                    ])->columns(2),

                Section::make('Review & Approval')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending Review',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                                'completed' => 'Adoption Completed',
                            ])
                            ->default('pending')
                            ->required(),
                        
                        Select::make('approved_by')
                            ->label('Approved By')
                            ->options(User::where('role', 'admin')->pluck('name', 'id'))
                            ->searchable()
                            ->visible(fn (string $context): bool => $context === 'edit'),
                        
                        DatePicker::make('approved_at')
                            ->visible(fn (string $context): bool => $context === 'edit'),
                        
                        Textarea::make('notes')
                            ->rows(3)
                            ->placeholder('Admin notes about this adoption request'),
                        
                        Textarea::make('rejection_reason')
                            ->rows(3)
                            ->placeholder('Reason for rejection (if applicable)')
                            ->visible(fn (string $context): bool => $context === 'edit'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('animal.name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('adopter_name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('adopter_email')
                    ->searchable(),
                
                TextColumn::make('adopter_phone')
                    ->searchable(),
                
                TextColumn::make('adopter_age')
                    ->sortable(),
                
                TextColumn::make('adopter_occupation')
                    ->searchable(),
                
                BadgeColumn::make('adopter_experience')
                    ->colors([
                        'success' => fn ($state) => $state,
                        'danger' => fn ($state) => !$state,
                    ])
                    ->formatStateUsing(fn ($state) => $state ? 'Experienced' : 'No Experience'),
                
                TextColumn::make('adopter_housing_type')
                    ->badge()
                    ->color('info'),
                
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'approved',
                        'danger' => 'rejected',
                        'success' => 'completed',
                    ]),
                
                TextColumn::make('approved_by')
                    ->label('Approved By')
                    ->getStateUsing(fn ($record) => $record->approvedBy?->name ?? 'N/A'),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending Review',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                        'completed' => 'Adoption Completed',
                    ]),
                
                SelectFilter::make('adopter_housing_type')
                    ->options([
                        'apartment' => 'Apartment',
                        'house' => 'House',
                        'condo' => 'Condo',
                        'townhouse' => 'Townhouse',
                        'farm' => 'Farm',
                        'other' => 'Other',
                    ]),
                
                Filter::make('pending')
                    ->query(fn (Builder $query): Builder => $query->pending())
                    ->label('Pending Review'),
                
                Filter::make('approved')
                    ->query(fn (Builder $query): Builder => $query->approved())
                    ->label('Approved Requests'),
                
                Filter::make('rejected')
                    ->query(fn (Builder $query): Builder => $query->rejected())
                    ->label('Rejected Requests'),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (AdoptionRequest $record) {
                        $record->update([
                            'status' => 'approved',
                            'approved_by' => auth()->id(),
                            'approved_at' => now(),
                        ]);
                    })
                    ->visible(fn (AdoptionRequest $record) => $record->status === 'pending'),
                Tables\Actions\Action::make('reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (AdoptionRequest $record) {
                        $record->update(['status' => 'rejected']);
                    })
                    ->visible(fn (AdoptionRequest $record) => $record->status === 'pending'),
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
            'index' => Pages\ListAdoptionRequests::route('/'),
            'create' => Pages\CreateAdoptionRequest::route('/create'),
            // 'view' => Pages\ViewAdoptionRequest::route('/{record}'),
            'edit' => Pages\EditAdoptionRequest::route('/{record}/edit'),
        ];
    }
}
