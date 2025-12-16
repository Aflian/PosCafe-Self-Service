<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(100),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                Select::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Admin',
                        'kasir' => 'Kasir',
                    ])
                    ->required(),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->minLength(6)
                    ->dehydrateStateUsing(fn ($state) => filled($state)
                        ? Hash::make($state)
                        : null
                    )
                    ->required(fn ($context) => $context === 'create')
                    ->visible(fn ($context) => $context === 'create'),
            ]);
    }
}
