<?php

namespace App\Filament\Admin\Resources;

use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    /**
     * Configura o formulário para criar/editar produtos.
     */
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nome')
                ->label('Nome')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('descricao')
                ->label('Descrição')
                ->required(),
            Forms\Components\TextInput::make('preco')
                ->label('Preço')
                ->numeric()
                ->required(),
            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'Ativo' => 'Ativo',
                    'Inativo' => 'Inativo',
                ])
                ->required(),
        ]);
    }

    /**
     * Configura a tabela de exibição dos produtos.
     */
    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nome')
                ->label('Nome')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('preco')
                ->label('Preço')
                ->sortable(),
            Tables\Columns\TextColumn::make('status')
                ->label('Status')
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Criação')
                ->dateTime()
                ->sortable(),
        ])->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'Ativo' => 'Ativo',
                    'Inativo' => 'Inativo',
                ]),
        ]);
    }

    /**
     * Configura o título e outras propriedades do recurso.
     */
    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\ProductResource\Pages\ListProducts::route('/'),
            'create' => \App\Filament\Admin\Resources\ProductResource\Pages\CreateProduct::route('/create'),
            'edit' => \App\Filament\Admin\Resources\ProductResource\Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
