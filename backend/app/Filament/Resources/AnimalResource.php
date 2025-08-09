<?php

namespace App\Filament\Resources;

use App\AnimalStatus;
use App\Filament\Resources\AnimalResource\Pages;
use App\Filament\Resources\AnimalResource\RelationManagers;
use App\Models\Animal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnimalResource extends Resource
{
    protected static ?string $model = Animal::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'dog' => 'Dog',
                                'cat' => 'Cat',
                                'bird' => 'Bird',
                                'rabbit' => 'Rabbit',
                                'hamster' => 'Hamster',
                                'fish' => 'Fish',
                                'other' => 'Other',
                            ]),
                        Forms\Components\TextInput::make('breed')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3),
                    ])->columns(2),
                
                Forms\Components\Section::make('Image')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->directory('animals')
                            ->visibility('public')
                            ->maxSize(5120) // 5MB
                            ->helperText('Upload a square image (1:1 aspect ratio). Max size: 5MB.')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Details')
                    ->schema([
                        Forms\Components\TextInput::make('age')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(30)
                            ->suffix('years'),
                        Forms\Components\Select::make('size')
                            ->required()
                            ->options([
                                'small' => 'Small',
                                'medium' => 'Medium',
                                'large' => 'Large',
                            ]),
                        Forms\Components\Select::make('energy')
                            ->required()
                            ->options([
                                'low' => 'Low',
                                'medium' => 'Medium',
                                'high' => 'High',
                            ]),
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                AnimalStatus::AVAILABLE->value => AnimalStatus::AVAILABLE->getLabel(),
                                AnimalStatus::NOT_AVAILABLE->value => AnimalStatus::NOT_AVAILABLE->getLabel(),
                            ])
                            ->default(AnimalStatus::AVAILABLE->value),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->size(50)
                    ->defaultImageUrl(url('/images/default-animal.svg')),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('breed')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('age')
                    ->numeric()
                    ->sortable()
                    ->suffix(' years'),
                Tables\Columns\TextColumn::make('size')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'small' => 'gray',
                        'medium' => 'warning',
                        'large' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('energy')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'low' => 'success',
                        'medium' => 'warning',
                        'high' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (AnimalStatus $state): string => $state->getColor())
                    ->formatStateUsing(fn (AnimalStatus $state): string => $state->getLabel()),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'dog' => 'Dog',
                        'cat' => 'Cat',
                        'bird' => 'Bird',
                        'rabbit' => 'Rabbit',
                        'hamster' => 'Hamster',
                        'fish' => 'Fish',
                        'other' => 'Other',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        AnimalStatus::AVAILABLE->value => AnimalStatus::AVAILABLE->getLabel(),
                        AnimalStatus::NOT_AVAILABLE->value => AnimalStatus::NOT_AVAILABLE->getLabel(),
                    ]),
                Tables\Filters\SelectFilter::make('size')
                    ->options([
                        'small' => 'Small',
                        'medium' => 'Medium',
                        'large' => 'Large',
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
            'index' => Pages\ListAnimals::route('/'),
            'create' => Pages\CreateAnimal::route('/create'),
            'view' => Pages\ViewAnimal::route('/{record}'),
            'edit' => Pages\EditAnimal::route('/{record}/edit'),
        ];
    }
}
