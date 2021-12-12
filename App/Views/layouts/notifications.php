<script>
    toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }

    <?php if (session()->hasFlash(\FLASH::SUCCESS)) : ?>
        <?php foreach (session()->getFlash(\FLASH::SUCCESS, []) as $message) : ?>
            toastr.success("<?= $message ?>", "Success");
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (session()->hasFlash(\FLASH::WARNING)) : ?>
        <?php foreach (session()->getFlash(\FLASH::WARNING, []) as $message) : ?>
            toastr.warning("<?= $message ?>", "Warning");
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (session()->hasFlash(\FLASH::ERROR)) : ?>
        <?php foreach (session()->getFlash(\FLASH::ERROR, []) as $message) : ?>
            toastr.error("<?= $message ?>", "Error");
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (session()->hasFlash(\FLASH::INFO)) : ?>
        <?php foreach (session()->getFlash(\FLASH::INFO, []) as $message) : ?>
            toastr.info("<?= $message ?>", "Info");
        <?php endforeach; ?>
    <?php endif; ?>

</script>