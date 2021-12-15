<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>

<section class="pt-5 pb-5" style="background-color:#F7F7F7;">
    <div class="container ">
        <div class="col ">
            <div class="card">

                <h2 class="pt-3 pb-3 text-center text-success">UPDATE YOUR PROFILE</h2>

                <div class="card-body">
                    <form id="updateForm" action="/profile/edit" method="post">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">First name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" id="firstname" name="firstname" class="form-control form-control-lg border border-success <?= isset($errors['firstname']) ? 'is-invalid' : '' ?>" value="<?= $params['firstname'] ?? null ?>" required />
                                <div class="text-danger">
                                    <?= $errors['firstname'] ?? null; ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" id="lastname" name="lastname" class="form-control form-control-lg border border-success <?= isset($errors['lastname']) ? 'is-invalid' : '' ?>" value="<?= $params['lastname'] ?? null ?>" required />
                                <div class="text-danger">
                                    <?= $errors['lastname'] ?? null; ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" id="email" name="email" class="form-control form-control-lg border border-success <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= $params['email'] ?? null ?>" required />
                                <div class="text-danger">
                                    <?= $errors['email'] ?? null; ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Location</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" id="location" name="location" class="form-control form-control-lg border border-success <?= isset($errors['location']) ? 'is-invalid' : '' ?>" value="<?= $params['location'] ?? null ?>" required />
                                <div class="text-danger">
                                    <?= $errors['location'] ?? null; ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" id="phone" name="phone" class="form-control form-control-lg border border-success <?= isset($errors['phone']) ? 'is-invalid' : '' ?>" value="<?= $params['phone'] ?? null ?>" required />
                                <div class="text-danger">
                                    <?= $errors['phone'] ?? null; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" form="updateForm" type="submit">Update</button>
                            <a href="<?= request()->baseUrl() ?>/profile"><button class="btn btn-secondary">Cancel</button></a>
                        </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $this->stop(); ?>