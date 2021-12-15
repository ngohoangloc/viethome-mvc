<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>

<section class="pt-5 pb-5" style="background-color:#F7F7F7;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5  text-dark">
                        <h3 class="mb-4 text-center text-success">CHANGE PASSWORD</h3>
                        <form class="change-password-form" method="post" action="/change-password">
                            <?php if (isset($errors['failed'])) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $errors['failed']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="old_password">Old password</label>
                                <input type="password" id="old_password" name="old_password" class="form-control form-control-lg border border-success <?= isset($errors['old_password']) ? 'is-invalid' : '' ?>" value="<?= $params['old_password'] ?? null ?>" required />
                                <div class="text-danger">
                                    <?= $errors['old_password'] ?? null; ?>
                                </div>
                            </div>
                            
                            <div class="form-outline mb-4">
                                <label class="form-label" for="new_password">New password</label>
                                <input type="password" id="new_password" name="new_password" class="form-control form-control-lg border border-success <?= isset($errors['new_password']) ? 'is-invalid' : '' ?>" value="<?= $params['new_password'] ?? null ?>" required />
                                <div class="text-danger">
                                    <?= $errors['new_password'] ?? null; ?>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="confirm_new_password">Confirm new password</label>
                                <input type="password" id="confirm_new_password" name="confirm_new_password" class="form-control form-control-lg border border-success <?= isset($errors['confirm_new_password']) ? 'is-invalid' : '' ?>" value="<?= $params['confirm_new_password'] ?? null ?>" required />
                                <div class="text-danger">
                                    <?= $errors['confirm_new_password'] ?? null; ?>
                                </div>
                            </div>

                            <div class="pt-3 pb-4 button text-center">
                                <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>
                            </div>
                        </form>
                        <div class="go-back">
                            <a href="/profile" class="text-secondary" style="position:relative;text-decoration: none;"><i class="fa fa-long-arrow-alt-left"></i> Go back to profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->stop(); ?>