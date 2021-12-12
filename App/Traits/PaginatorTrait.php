<?php
namespace App\Traits;

trait PaginatorTrait
{
    public function getPerPage()
    {

        $perPage = $this->request->get('per-page', null);
        if (!$perPage) {

            $perPage = session()->get('per-page', null);
            if (!$perPage) {

                $perPage = config('view.page.per-page', 15);

                session()->set('per-page', $perPage);
            }
        } else {

            session()->set('per-page', $perPage);
        }

        return $perPage;
    }

    public function getCurrentPage()
    {
        return $this->request->get('page', 1);
    }
}