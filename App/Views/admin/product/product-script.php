<script>
    $(document).ready(function() {
        $(document).on('click', '.delete-product', function(event) {
            event.preventDefault();

            showModalConfirm(event.currentTarget);
        })
    });


    function showModalConfirm(e) {
        var deleteModal = new bootstrap.Modal($('#confirmDeleteModal'), {
            keyboard: false
        });
        let url = $(e).prop('href');
        $("#deleteForm").prop('action', url);
        $("#product-id").val($(e).data('id'));
        $("#return-url").val($(e).data('return-url'));
        let msg = 'Are you sure you want to delete ' + $(e).data('name') + '?';
        $("#delete-message").text(msg);

        deleteModal.show();
    }

</script>