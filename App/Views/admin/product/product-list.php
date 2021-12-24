<div class="product-list list">
    <table class="table table-sm table-striped table-hover">
        <thead class="text-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td class="text-center"><?= $item->id; ?></td>
                    <td><?= $item->name; ?></td>
                    <td><?= $item->category->id . ' - ' . $item->category->name; ?></td>
                    <td class="text-end"><?= $item->price; ?>$ </td>
                    <td><?= $item->created_at; ?></td>
                    <td>
                        <a class="edit-product edit-item text-success px-2" href="<?= request()->baseUrl() ?>/admin/product/edit?id=<?= $item->id ?>" title="Edit <?= $item->name ?>" data-return-url="<?= request()->fullUrl();?>" value="<?= $item->id; ?>">
                            <i class="far fa-edit"></i>
                        </a>

                        <a class="delete-product remove-item text-danger" href="<?= request()->baseUrl() ?>/admin/product/delete" data-id="<?= $item->id ?>" title="Delete <?= $item->name ?>" data-name="<?= $item->name ?>" data-return-url="<?= request()->fullUrl(); ?>">
                        <i class="far fa-window-close"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div>
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>

<?= $this->insert('admin/product/product-delete-modal'); ?>