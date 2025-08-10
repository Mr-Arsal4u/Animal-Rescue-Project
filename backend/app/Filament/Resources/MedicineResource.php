<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicineResource\Pages;
use App\Models\Medicine;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class MedicineResource extends Resource
{
    protected static ?string $model = Medicine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Medical Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        
                        Textarea::make('description')
                            ->required()
                            ->rows(3),
                        
                        Select::make('category')
                            ->options([
                                'antibiotics' => 'Antibiotics',
                                'painkillers' => 'Painkillers',
                                'vaccines' => 'Vaccines',
                                'vitamins' => 'Vitamins',
                                'parasiticides' => 'Parasiticides',
                                'anesthetics' => 'Anesthetics',
                                'other' => 'Other',
                            ])
                            ->required(),
                        
                        Select::make('dosage_form')
                            ->options([
                                'tablet' => 'Tablet',
                                'capsule' => 'Capsule',
                                'liquid' => 'Liquid',
                                'injection' => 'Injection',
                                'cream' => 'Cream',
                                'ointment' => 'Ointment',
                                'drops' => 'Drops',
                                'spray' => 'Spray',
                            ])
                            ->required(),
                        
                        TextInput::make('strength')
                            ->required()
                            ->maxLength(100),
                        
                        TextInput::make('manufacturer')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Pricing & Stock')
                    ->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->minValue(0),
                        
                        TextInput::make('stock_quantity')
                            ->required()
                            ->numeric()
                            ->minValue(0),
                        
                        DatePicker::make('expiry_date')
                            ->required()
                            ->minDate(now()),
                        
                        Toggle::make('prescription_required')
                            ->label('Prescription Required'),
                    ])->columns(2),

                Section::make('Additional Information')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('medicines')
                            ->maxSize(5120),
                        
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'discontinued' => 'Discontinued',
                            ])
                            ->required(),
                        
                        Textarea::make('side_effects')
                            ->rows(3),
                        
                        Textarea::make('contraindications')
                            ->rows(3),
                        
                        TextInput::make('storage_conditions')
                            ->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->circular()
                    ->size(50),
                
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('category')
                    ->badge()
                    ->color('primary'),
                
                TextColumn::make('dosage_form')
                    ->badge()
                    ->color('info'),
                
                TextColumn::make('strength')
                    ->searchable(),
                
                TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                
                TextColumn::make('stock_quantity')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        $state > 50 => 'success',
                        $state > 10 => 'warning',
                        default => 'danger',
                    }),
                
                TextColumn::make('expiry_date')
                    ->date()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        strtotime($state) < strtotime('+30 days') => 'danger',
                        strtotime($state) < strtotime('+90 days') => 'warning',
                        default => 'success',
                    }),
                
                ToggleColumn::make('prescription_required')
                    ->label('Rx Required'),
                
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'warning',
                        'discontinued' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'antibiotics' => 'Antibiotics',
                        'painkillers' => 'Painkillers',
                        'vaccines' => 'Vaccines',
                        'vitamins' => 'Vitamins',
                        'parasiticides' => 'Parasiticides',
                        'anesthetics' => 'Anesthetics',
                        'other' => 'Other',
                    ]),
                
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'discontinued' => 'Discontinued',
                    ]),
                
                Filter::make('in_stock')
                    ->query(fn (Builder $query): Builder => $query->where('stock_quantity', '>', 0))
                    ->label('In Stock'),
                
                Filter::make('expiring_soon')
                    ->query(fn (Builder $query): Builder => $query->where('expiry_date', '<=', now()->addDays(30)))
                    ->label('Expiring Soon'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMedicines::route('/'),
            'create' => Pages\CreateMedicine::route('/create'),
            'edit' => Pages\EditMedicine::route('/{record}/edit'),
        ];
    }
}
