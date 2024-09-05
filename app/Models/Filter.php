<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class Filter extends Model
{
    use HasFactory;
    public static function filterAndPaginate(Collection $rawData, $page, $parameters, $sort_by)
    {
        $data = $rawData->sortByDesc($sort_by);
        $filteredData = $data->filter(function ($item) use ($parameters) {
            foreach ($parameters as $isiSearch) {
                if (array_key_exists($isiSearch, $item) && request($isiSearch)) {
                    return stripos($item[$isiSearch], request($isiSearch)) !== false;
                }
            }
            return true;
        });
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = $page;
        $currentPageItems = $filteredData->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedItems = new LengthAwarePaginator(
            $currentPageItems,
            $filteredData->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        foreach ($parameters as $isiSearch) {
            if (request($isiSearch)) {
                $paginatedItems->appends($isiSearch, request($isiSearch));
            }
        }

        return $paginatedItems;
    }
}
