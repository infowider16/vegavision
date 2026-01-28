<?php

namespace App\Repositories\Eloquent;

use App\Models\ContactUs;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Support\Facades\Log;

class ContactFormRepository extends BaseRepository
{
    protected $model;
    protected $cache;

    public function __construct(
        ContactUs $model,
        Cache $cache
    ) {
        $this->model = $model;
        $this->cache = $cache;
      
    }

    public function query()
    {
        return  $this->model->query(); 
    }

    
}
