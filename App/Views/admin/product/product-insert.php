<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>

<section class="py-5">
    <div class="container">
        <div class="card">
            <h2 class="pt-3 pb-3 text-center text-success">ADD PRODUCT</h2>

            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data" id="insertForm">
                    <div class="row">
                        <div class="col-4">
                            <h6 class="mb-0">Name product</h6>
                        </div>
                        <div class="col-8 text-secondary">
                            <input class="border border-secondary form-control" maxlength="1000" type="text" id="name" name="name" value="<?= $params['name'] ?? null ?>" required />
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-4">
                            <h6 class="mb-0">Price</h6>
                        </div>
                        <div class="col-8 text-secondary">
                            <input class="border border-secondary  form-control" type="number" min="1" step="any" id="price" name="price"  value="<?= $params['price'] ?? null ?>" required />
                            <div class="text-danger">
                                <?= $errors['price'] ?? null; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-4">
                            <h6 class="mb-0">Description</h6>
                        </div>
                        <div class="col-8 text-secondary">
                            <textarea class="border border-secondary form-control" rows="4" id="description" name="description"><?=$params['description'] ?? null ?> </textarea>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-4">
                            <h6 class="mb-0">Category</h6>
                        </div>
                        <div class="col-8 text-secondary">
                            <select class="form-select" name="category_id">
                                <option selected>Choose ...</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id ?>" <?= ($category->id == $params['category_id']) ? 'selected' : null ?> > <?= $category->name ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-4">
                            <h6 class="mb-0">Thumbnail image</h6>
                        </div>
                        <div class="col-8 text-secondary">
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                            <div class="text-danger">
                                <?= $errors['thumbnail'] ?? null; ?>
                            </div>
                        </div>
                    </div>

                </form>
                <hr>
                <div class="col-sm-12 text-center">
                    <button type="submit" id="btnConfirmInsert" form="insertForm" class="btn btn-success">Add</button>
                    <a href="<?= request()->baseUrl() ?>/admin/product"><button class="btn btn-secondary">Cancel</button></a>
                </div>
            </div>

        </div>

    </div>
</section>
<?php $this->stop(); ?>