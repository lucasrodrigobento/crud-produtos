<?php

namespace App\DTO;

class ProductDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $nome,
        public readonly string $descricao,
        public readonly float $preco,
        public readonly string $status,
        public readonly ?string $deleted_at,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    /**
     * Cria um DTO a partir de um array de dados
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            nome: $data['nome'],
            descricao: $data['descricao'],
            preco: (float)$data['preco'],
            status: $data['status'],
            deleted_at: $data['deleted_at'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }

    /**
     * Converte o DTO de volta para um array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'status' => $this->status,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
