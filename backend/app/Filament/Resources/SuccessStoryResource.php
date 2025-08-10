<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuccessStoryResource\Pages;
use App\Filament\Resources\SuccessStoryResource\RelationManagers;
use App\Models\SuccessStory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class SuccessStoryResource extends Resource
{
    protected static ?string $model = SuccessStory::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    
    protected static ?string $navigationGroup = 'Content Management';
    
    protected static ?string $navigationLabel = 'Success Stories';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Story Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Luna\'s Journey'),
                        
                        Select::make('type')
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
                                'chinchilla' => 'Chinchilla',
                                'parrot' => 'Parrot',
                                'canary' => 'Canary',
                                'cockatiel' => 'Cockatiel',
                                'budgie' => 'Budgie',
                                'turtle' => 'Turtle',
                                'lizard' => 'Lizard',
                                'snake' => 'Snake',
                                'horse' => 'Horse',
                                'pig' => 'Pig',
                                'goat' => 'Goat',
                                'sheep' => 'Sheep',
                                'cow' => 'Cow',
                                'other' => 'Other',
                            ]),
                        
                        TextInput::make('breed')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Golden Retriever'),
                    ])->columns(3),
                
                Forms\Components\Section::make('Story Content')
                    ->schema([
                        Textarea::make('story')
                            ->required()
                            ->rows(6)
                            ->placeholder('Describe the animal\'s journey from rescue to adoption...'),
                        
                        Repeater::make('stats')
                            ->schema([
                                TextInput::make('stat')
                                    ->required()
                                    ->placeholder('Full Recovery'),
                            ])
                            ->defaultItems(3)
                            ->minItems(1)
                            ->maxItems(5)
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Adoption Details')
                    ->schema([
                        TextInput::make('timeline')
                            ->required()
                            ->placeholder('6 months'),
                        
                        TextInput::make('location')
                            ->required()
                            ->placeholder('Downtown Rescue'),
                        
                        TextInput::make('adopted_by')
                            ->required()
                            ->placeholder('The Johnson Family'),
                        
                        DatePicker::make('adoption_date')
                            ->required()
                            ->default(now()),
                    ])->columns(2),
                
                Forms\Components\Section::make('Media')
                    ->schema([
                        FileUpload::make('before_image')
                            ->image()
                            ->imageEditor()
                            ->directory('success-stories/before')
                            ->visibility('public')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->label('Before Image')
                            ->helperText('Upload the "before" image showing the animal\'s condition when rescued'),
                        
                        FileUpload::make('after_image')
                            ->image()
                            ->imageEditor()
                            ->directory('success-stories/after')
                            ->visibility('public')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->label('After Image')
                            ->helperText('Upload the "after" image showing the animal\'s recovery'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Settings')
                    ->schema([
                        Toggle::make('featured')
                            ->label('Featured Story')
                            ->helperText('Featured stories will be highlighted on the website'),
                        
                        Select::make('status')
                            ->options([
                                'published' => 'Published',
                                'draft' => 'Draft',
                            ])
                            ->default('published')
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('before_image')
                    ->circular()
                    ->size(50)
                    ->label('Before'),
                
                ImageColumn::make('after_image')
                    ->circular()
                    ->size(50)
                    ->label('After'),
                
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                TextColumn::make('type')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                
                TextColumn::make('breed')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('adopted_by')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('adoption_date')
                    ->date()
                    ->sortable(),
                
                ToggleColumn::make('featured')
                    ->label('Featured')
                    ->onColor('success')
                    ->offColor('gray'),
                
                BadgeColumn::make('status')
                    ->colors([
                        'success' => 'published',
                        'warning' => 'draft',
                    ]),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'dog' => 'Dog',
                        'cat' => 'Cat',
                        'bird' => 'Bird',
                        'rabbit' => 'Rabbit',
                        'hamster' => 'Hamster',
                        'fish' => 'Fish',
                        'other' => 'Other',
                    ]),
                
                TernaryFilter::make('featured')
                    ->label('Featured Stories'),
                
                SelectFilter::make('status')
                    ->options([
                        'published' => 'Published',
                        'draft' => 'Draft',
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
            'index' => Pages\ListSuccessStories::route('/'),
            'create' => Pages\CreateSuccessStory::route('/create'),
            'view' => Pages\ViewSuccessStory::route('/{record}'),
            'edit' => Pages\EditSuccessStory::route('/{record}/edit'),
        ];
    }
}
