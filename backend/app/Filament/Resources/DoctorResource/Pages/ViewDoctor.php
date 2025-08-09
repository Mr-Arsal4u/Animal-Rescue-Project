<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewDoctor extends ViewRecord
{
    protected static string $resource = DoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Basic Information')
                    ->schema([
                        Infolists\Components\ImageEntry::make('image')
                            ->circular()
                            ->size(100),
                        
                        Infolists\Components\TextEntry::make('name')
                            ->label('Name')
                            ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                            ->weight('bold'),
                        
                        Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-m-envelope'),
                        
                        Infolists\Components\TextEntry::make('phone')
                            ->label('Phone')
                            ->icon('heroicon-m-phone'),
                        
                        Infolists\Components\TextEntry::make('specialization')
                            ->label('Specialization')
                            ->badge()
                            ->color('primary'),
                    ])->columns(2),
                
                Infolists\Components\Section::make('Professional Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('qualifications')
                            ->label('Qualifications')
                            ->markdown(),
                        
                        Infolists\Components\TextEntry::make('experience_years')
                            ->label('Experience')
                            ->suffix(' years'),
                        
                        Infolists\Components\TextEntry::make('bio')
                            ->label('Biography')
                            ->markdown()
                            ->columnSpanFull(),
                        
                        Infolists\Components\TextEntry::make('address')
                            ->label('Address')
                            ->icon('heroicon-m-map-pin'),
                    ])->columns(2),
                
                Infolists\Components\Section::make('Status')
                    ->schema([
                        Infolists\Components\IconEntry::make('status')
                            ->label('Status')
                            ->boolean()
                            ->trueIcon('heroicon-o-check-circle')
                            ->falseIcon('heroicon-o-x-circle')
                            ->trueColor('success')
                            ->falseColor('danger'),
                        
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Added on')
                            ->dateTime(),
                    ])->columns(2),
            ]);
    }
}
