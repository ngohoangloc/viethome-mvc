<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>

<section class="vh-100" style="background-color:#F7F7F7;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <form class="login-form" method="post" action="/login">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5  text-dark">

                            <h3 class="mb-4 text-center text-success">LOGIN</h3>

                            <?php if (!empty($errors)) : ?>
                                <div class="aler">
                                    <ul class="list-group">
                                        <?php
                                        foreach ($errors as $err) {
                                            echo "<li class=\"list-group-item list-group-item-danger\">$err</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control form-control-lg border border-success" required/>

                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password"class="form-control form-control-lg border border-success" required/>
                            </div>
                            <div class="text-end">
                                <a href="" class="stretched-link text-success" style="position:relative;text-decoration: none;">Forgot password ?</a>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="remember_me" id="remember_me" name="remember_me"/>
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>

                            <div class="pt-3 pb-4 button text-center">
                                <button class="btn btn-success btn-lg btn-block " type="submit">Login</button>
                            </div>

                            <p>
                                Don't have an account?
                                <a href="/register" class="stretched-link text-success" style="position:relative;text-decoration: none;">Register here</a>
                            </p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php $this->stop(); ?>