<?php

namespace App\Http;

use App\Traits\PaginatorTrait;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{
    use PaginatorTrait;
    /**
     * Request
     *
     * @var \App\Http\Request
     */
    public $request;

    /**
     * Create a new paginator instance.
     *
     * @param \App\Http\Request $request
     * @param  mixed  $items
     * @param  int  $total
     * @param  int  $perPage
     * @param  int|null  $currentPage
     * @param  array  $options  (path, query, fragment, pageName)
     * @return void
     */
    public function __construct($request, $items, $total, $perPage = null, $currentPage = null, array $options = [])
    {
        $this->request = $request;
        $perPage = $perPage ?? $this->getPerPage();
        $currentPage = $currentPage ?? $this->getCurrentPage();
        $options = array_merge(
            $options,
            [
                'path' => $request->url(),
                // 'query' => $request->getQuery()
            ]
        );
        parent::__construct($items, $total, $perPage, $currentPage, $options);
    }


    public function getElements()
    {
        return $this->elements();
    }
}
