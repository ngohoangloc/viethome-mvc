<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>

<section class="vh-100" style="background-color:#F7F7F7;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                <?php if (isset($errors['failed'])) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $errors['failed']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php endif; ?>

                <form class="register-form" method="post" action="/register">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5  text-dark">

                            <h3 class="mb-4 text-center text-success">Register</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control form-control-lg border border-success <?= isset($errors['username']) ? 'is-invalid' : '' ?>" value="<?= $params['username'] ?? null ?>" required/>
                                <div class="text-danger">
                                    <?= $errors['username'] ?? null; ?>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg border border-success <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= $params['email'] ?? null ?>" required/>
                                <div class="text-danger">
                                    <?= $errors['email'] ?? null; ?>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg border border-success <?= isset($errors['password']) ? 'is-invalid' : '' ?>" value="<?= $params['password'] ?? null ?>" required/>
                                <div class="text-danger">
                                    <?= $errors['password'] ?? null; ?>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="confirm_password">Confirm password</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg border border-success <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>" value="<?= $params['confirm_password'] ?? null ?>" required/>
                                <div class="text-danger">
                                    <?= $errors['confirm_password'] ?? null; ?>
                                </div>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="" id="terms" required>
                                <label for="form-check-input">Agree to terms and conditions</label>
                            </div>

                            <div class="pt-3 pb-4 button text-center">
                                <button class="btn btn-success btn-lg btn-block " type="submit">Sign up</button>
                            </div>

                            <p>
                                Already member?
                                <a href="/login" class="stretched-link text-success" style="position:relative;text-decoration: none;">Login here</a>
                            </p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php $this->stop(); ?>