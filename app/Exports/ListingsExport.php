<?php

namespace App\Exports;

use App\Models\AbstractEntity;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListingsExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct(
        AbstractEntity $entity,
        Request $request
    )
    {
        $this->entity = $entity;
        $this->request = $request;
    }

    public function collection()
    {
        return $this
            ->entity
            ->crudFilter($this->request->all())
            ->activeOrDisabled()
            ->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Titre',
            'Catégorie',
            'Vues',
            'Appels',
            'WhatsApp',
            'Adresse',
            'Statut',
            'Prix',
            'Mise à jour',
        ];
    }

    public function map($listing): array
    {
        return [
            $listing->id,
            $listing->title,
            $listing->category->title,
            $listing->views ?? 0,
            $listing->phone_number_views ?? 0,
            $listing->whatsapp_views ?? 0,
            $listing->location->title,
            $listing->listingStatus->title ?? __('Inconnu'),
            $listing->price,
            formatFrenchDate($listing->updated_at),
        ];
    }
}
