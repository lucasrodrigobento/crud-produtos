<?php

namespace App\Filament\Admin\Resources\ProductResource\Pages;

use App\DTO\ProductDTO;
use App\Filament\Admin\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $dto = ProductDTO::fromArray($data);

        return $dto->toArray();
    }
}
