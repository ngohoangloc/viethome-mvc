<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Contact Us</h1>
        <p>
            Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet.
        </p>
    </div>
</div>

<!-- Start Map -->
<div id="mapid" style="width: 100%; height: 400px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15715.510372160896!2d105.77043858050537!3d10.02695873972208!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1638983881656!5m2!1svi!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<!-- Ena Map -->

<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="inputemail">Email</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="mb-3">
                <label for="inputsubject">Subject</label>
                <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Subject">
            </div>
            <div class="mb-3">
                <label for="inputmessage">Message</label>
                <textarea class="form-control mt-1" id="message" name="message" placeholder="Message" rows="8"></textarea>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3">Let’s Talk</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact -->

<?php $this->stop(); ?>