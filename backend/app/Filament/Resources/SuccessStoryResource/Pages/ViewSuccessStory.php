<?php

namespace App\Filament\Resources\SuccessStoryResource\Pages;

use App\Filament\Resources\SuccessStoryResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\KeyValue;

class ViewSuccessStory extends ViewRecord
{
    protected static string $resource = SuccessStoryResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Story Information')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Story Title')
                            ->size('lg')
                            ->weight('bold'),
                        
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('type')
                                    ->badge()
                                    ->color('primary'),
                                
                                TextEntry::make('breed')
                                    ->label('Breed'),
                                
                                TextEntry::make('timeline')
                                    ->label('Recovery Timeline'),
                            ]),
                    ]),
                
                Section::make('Story Content')
                    ->schema([
                        TextEntry::make('story')
                            ->markdown()
                            ->prose()
                            ->columnSpanFull(),
                        
                        TextEntry::make('stats')
                            ->listWithLineBreaks()
                            ->columnSpanFull(),
                    ]),
                
                Section::make('Before & After Images')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                ImageEntry::make('before_image')
                                    ->label('Before Image')
                                    ->circular()
                                    ->size(300),
                                
                                ImageEntry::make('after_image')
                                    ->label('After Image')
                                    ->circular()
                                    ->size(300),
                            ]),
                    ]),
                
                Section::make('Adoption Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('location')
                                    ->label('Rescue Location'),
                                
                                TextEntry::make('adopted_by')
                                    ->label('Adopted By'),
                            ]),
                        
                        TextEntry::make('adoption_date')
                            ->label('Adoption Date')
                            ->date(),
                    ]),
                
                Section::make('Story Settings')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('featured')
                                    ->label('Featured Story')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-star')
                                    ->falseIcon('heroicon-o-star'),
                                
                                TextEntry::make('status')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'published' => 'success',
                                        'draft' => 'warning',
                                        default => 'gray',
                                    }),
                            ]),
                    ]),
            ]);
    }
}
