<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MacroserviceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->lazyload();
        $this->jsonResponse();
    }

    /**
     *  Lazy load data returned using pagination
     *  Checks if request wants to apply filter and if the package used for filter using query on model is extended
     */
    protected function lazyload()
    {
        Builder::macro('lazyload', function ($applyFilters = TRUE) {
            if ($applyFilters && in_array('eloquentFilter\QueryFilter\ModelFilters\Filterable', class_uses_recursive($this->model))) {
                $this->filter();
            }
            return $this->paginate(config('builder.pagination.limit'));
        });
    }

    /**
     * Additional custom methods for $request object to handle the API process accordingly based from the source
     *
     * @return void
     */
    protected function jsonResponse()
    {
        Request::macro('isDefault', function () {
            return $this->wantsJson();
        });

        Response::macro('api', function (array $data = [], string $message = '', int $statusCode = 200) {
            return response()->json([
                'data' => $data,
                'message' => $message,
                'status' => $statusCode,
            ], $statusCode);
        });
    }
}
