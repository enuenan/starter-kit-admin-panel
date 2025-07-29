<?php

namespace App\Http\Resources;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class BaseResource extends JsonResource
{
    public static function getInstance($resource)
    {
        return new static($resource);
    }

    public function transformPayload()
    {
        return self::isCollectionData($this->resource) ? self::collection($this->resource) : self::make($this->resource);
    }

    public static function payload($data)
    {
        return self::isCollectionData($data) ? self::collection($data) : self::make($data);
    }

    private static function isCollectionData($data)
    {
        return $data && ($data instanceof Collection || $data instanceof LengthAwarePaginator || Arr::get($data, '0'));
    }
}
