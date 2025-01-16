<?php

namespace App\Filament\Admin\Resources;

use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

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
            TextInput::make('nome')
                ->label('Nome')
                ->required()
                ->maxLength(255),
            Textarea::make('descricao')
                ->label('Descrição')
                ->required(),
            TextInput::make('preco')
                ->label('Preço')
                ->numeric()
                ->required(),
            Select::make('status')
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
            TextColumn::make('nome')
                ->label('Nome')
                ->sortable()
                ->searchable(),
            TextColumn::make('preco')
                ->label('Preço')
                ->sortable(),
            TextColumn::make('status')
                ->label('Status')
                ->sortable(),
            TextColumn::make('created_at')
                ->label('Criação')
                ->dateTime()
                ->sortable(),
        ])->filters([
            SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'Ativo' => 'Ativo',
                    'Inativo' => 'Inativo',
                ]),
            Filter::make('search')
                ->query(function ($query, $data) {
                    if ($data['search']) {
                        $query->where(function ($query) use ($data) {
                            $query->where('nome', 'like', '%' . $data['search'] . '%')
                                ->orWhere('descricao', 'like', '%' . $data['search'] . '%');
                        });
                    }
                }),
        ])
            ->searchable()
            ->searchPlaceholder('Digite para buscar...')
            ->searchDebounce('2000ms');
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

    public static function getModelLabel(): string
    {
        return 'Produto';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Produtos';
    }

}
