<?php

namespace App\Repositories\Eloquent;

use App\Models\SiteSetting;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Support\Facades\Log;

class SiteSettingRepository extends BaseRepository
{
    protected $model;
    protected $cache;

    public function __construct(SiteSetting $model, Cache $cache)
    {
        $this->model = $model;
        parent::__construct($model, $cache);
    }

    public function updateSettings(array $data)
    {
        try {
            foreach ($data as $key => $value) {
                $this->model->updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
            return true;
        } catch (\Exception $e) {
            Log::error("Error in SiteSettingRepository.updateSettings(): " . $e->getMessage());
            throw $e;
        }
    }

    public function getAllSettings()
    {
        try {
            return $this->model->pluck('value', 'key')->toArray();
        } catch (\Exception $e) {
            Log::error("Error in SiteSettingRepository.getAllSettings(): " . $e->getMessage());
            return [];
        }
    }

    public function getOne(array $byWhere)
    {
        try {
            return $this->model->where($byWhere)->first();
        } catch (\Exception $e) {
            Log::error("Error in SiteSettingRepository.getOne(): " . $e->getMessage());
            return null;
        }
    }

    public function delete(array $byWhere)
    {
        try {
            $setting = $this->model->where($byWhere)->first();
            if ($setting) {
                return $setting->delete();
            }
            return false;
        } catch (\Exception $e) {
            Log::error("Error in SiteSettingRepository.delete(): " . $e->getMessage());
            return false;
        }
    }

    public function getByWhere(array $byWhere, array $orderBy = ['id' => 'desc'])
    {
        try {
            $query = $this->model->where(function ($query) use ($byWhere) {
                foreach ($byWhere as $column => $condition) {
                    if (is_array($condition)) {
                        if ($condition[0] === 'IN') {
                            unset($condition[0]);
                            $query->whereIn($column, $condition);
                        } else {
                            $query->where($column, $condition[0], $condition[1]);
                        }
                    } else {
                        $query->where($column, $condition);
                    }
                }
            });

            foreach ($orderBy as $column => $direction) {
                $query->orderBy($column, $direction);
            }

            return $query->get();
        } catch (\Exception $e) {
            Log::error("Error in SiteSettingRepository.getByWhere(): " . $e->getMessage());
            return collect([]);
        }
    }
}
