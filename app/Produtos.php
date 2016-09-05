<?php

namespace Ecommerce;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
	use Searchable;

	public function searchableAs()
    {
        return 'produtos';
    }
}
