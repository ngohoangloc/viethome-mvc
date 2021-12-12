<!-- Modal -->
<div class="modal show" id="logoutModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center text-danger">Are you sure?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fa fa-close"> </i> Cancel
                </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="logout(event)">
                    <i class="fa fa-power-off"> </i> Logout
                </button>
            </div>
        </div>
    </div>
</div>

<form action="/logout" method="POST" id="logoutForm">
    <!-- additional paramters here -->
</form>

<script>
    function logout(e) {
        let form = document.getElementById('logoutForm');
        form.submit();
    }
</script>