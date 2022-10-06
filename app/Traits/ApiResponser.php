<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{
    protected function successResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code = 404)
    {
        return response()->json(['message' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {

        if ($collection->isEmpty()) {
            return $this->successResponse($collection, $code);
        }
        $collection = $this->paginate($collection);
        $collection = $this->cacheResponse($collection);

        return $this->successResponse($collection, $code);
    }

    protected function showOne(Model $instance, $code = 200)
    {
        return $this->successResponse($instance, $code);
    }

    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }

    protected function paginate(Collection $collection)
    {
        $rules = [
            'per_page' => 'integer|min:2|max:50'
        ];
        Validator::validate(request()->all(), $rules);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 15;

        if (request()->has('per_page')) {
            $perPage = (int) request()->per_page;
        }

        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $paginated->appends(request()->all());
        return $paginated;
    }

    protected function cacheResponse($data)
    {
        $url = request()->url;
        return Cache::remember($url, 15 / 60, function () use ($data) {
            return $data;
        });
    }
}
