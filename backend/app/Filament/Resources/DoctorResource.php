<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource\RelationManagers;
use App\Models\Doctor;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationGroup = 'Medical Team';
    
    protected static ?string $navigationLabel = 'Doctors';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Dr. John Doe'),
                        
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('doctor@rescue.com'),
                        
                        TextInput::make('phone')
                            ->tel()
                            ->placeholder('+1 (555) 123-4567'),
                        
                        TextInput::make('specialization')
                            ->required()
                            ->placeholder('Veterinary Surgery'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Professional Details')
                    ->schema([
                        Textarea::make('qualifications')
                            ->rows(3)
                            ->placeholder('DVM, PhD in Veterinary Medicine, Board Certified...'),
                        
                        TextInput::make('experience_years')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(50)
                            ->placeholder('5'),
                        
                        Textarea::make('bio')
                            ->rows(4)
                            ->placeholder('Brief biography and professional background...'),
                        
                        TextInput::make('address')
                            ->placeholder('123 Medical Center Dr, City, State 12345'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Media & Status')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->directory('doctors')
                            ->visibility('public')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400'),
                        
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->default('active')
                            ->required(),
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
                    ->sortable()
                    ->weight('bold'),
                
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('specialization')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('experience_years')
                    ->numeric()
                    ->sortable()
                    ->suffix(' years'),
                
                ToggleColumn::make('status')
                    ->label('Active')
                    ->onColor('success')
                    ->offColor('danger'),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),
                
                SelectFilter::make('specialization')
                    ->options([
                        'Veterinary Surgery' => 'Veterinary Surgery',
                        'Emergency Medicine' => 'Emergency Medicine',
                        'General Practice' => 'General Practice',
                        'Dermatology' => 'Dermatology',
                        'Cardiology' => 'Cardiology',
                        'Oncology' => 'Oncology',
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
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'view' => Pages\ViewDoctor::route('/{record}'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
