<?php

namespace FilamentPro\FilamentUser\Resources;

use App\Models\User;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use FilamentPro\FilamentUser\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use STS\FilamentImpersonate\Impersonate;

class UserResource extends Resource
{
    protected static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';

    public static function getLabel(): string
    {
        return __('User');
    }

    public static function getPluralLabel(): string
    {
        return static::getLabel();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('password')
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
//                BelongsToManyMultiSelect::make('roles')->relationship('roles', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('created_at')
                    ->dateTime('M j, Y')->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime('M j, Y')->sortable(),
            ])
            ->prependActions([
                Impersonate::make('impersonate')->tooltip(__('Impersonate')),
            ])
            ->prependBulkActions([
                ExportAction::make('export')->label('Export selected')->icon('heroicon-o-download')->withHeadings(),
            ])
            ->filters([
                Filter::make('verified')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                Filter::make('unverified')
                    ->query(fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
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
            'index' => Pages\ListUsers::route('/'),
//            'index' => Pages\ManageUser::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
