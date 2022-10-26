<?php

namespace App\Modules\Admin\Models;

use App\Modules\Api\Models\ProjectsModel;
use App\Traits\Filterable;

class ProjectsFilter extends ProjectsModel
{
    use Filterable;

    /**
     * The filters that can be applied to
     * lists of Users.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Provides filtering functionality.
     *
     * @param array $params
     *
     * @return UserFilter
     */
    public function filter(array $params = null)
    {
        return [];
    }
}
