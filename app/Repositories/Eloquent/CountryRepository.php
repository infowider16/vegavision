<?php

namespace App\Repositories\Eloquent;
use App\Models\Country;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Support\Facades\Log;

class CountryRepository extends BaseRepository
{
    protected $model;
    protected $cache;
    public function __construct(
        Country $model,
        Cache $cache
    ) {
        $this->model = $model;
        parent::__construct($model, $cache);
    }

    public function getAll()
    {
        try {
            return $this->model->get();
        } catch (\Exception $e) {
            Log::error("Error in CountryRepository.getAll(): " . $e->getMessage());
            return response()->json(['status' => '0', 'message' => __('message.statusZero')]);
        }
    }

}
