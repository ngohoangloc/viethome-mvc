<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h2>Products</h2>
            </div>
            <div class="col-7">
                <form action="/admin/product/search" method="get" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control form-control-sm" id="search" name="q" placeholder="Search ...">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-1 text-end">
                <a class="btn btn-success insert-product" href="<?= request()->baseUrl() ?>/admin/product/add">Add</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12" id="product-list">
                <?php $this->insert('admin/product/product-list', [
                    'items' => $items,
                    'paginator' => $paginator
                ]); ?>
            </div>
        </div>
    </div>
</section>

<?php $this->stop(); ?>