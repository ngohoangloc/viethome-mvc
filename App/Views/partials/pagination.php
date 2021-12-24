<ul class="pagination justify-content-center">
    <li class="px-2">
        <form action="<?= $paginator->url(1); ?>">
            <select name="per-page" class="form-select" onchange="this.form.submit()">
                <option <?= $paginator->getPerPage() == 15 ? "selected" : '' ?> value="15">15</option>
                <option <?= $paginator->getPerPage() == 25 ? "selected" : '' ?> value="25">25</option>
                <option <?= $paginator->getPerPage() == 50 ? "selected" : '' ?> value="50">50</option>
                <option <?= $paginator->getPerPage() == 100 ? "selected" : '' ?> value="100">100</option>
            </select>
        </form>
    </li>
    <!-- Previous Page Link -->
    <?php if ($paginator->onFirstPage()) : ?>
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">&laquo;</a></li>
    <?php else : ?>
        <li class="page-item"><a class="page-link" href="<?php echo $paginator->previousPageUrl(); ?>" rel="prev">&laquo;</a></li>
    <?php endif; ?>

    <!-- Pagination Elements -->
    <?php foreach ($paginator->getElements() as $element) : ?>
        <!-- "Three Dots" Separator -->
        <?php if (is_string($element)) : ?>
            <li class="page-item disabled"><a class="page-link" href="javascript:void(0)"><?php echo $element; ?></a></li>
        <?php endif; ?>

        <!-- Array Of Links -->
        <?php if (is_array($element)) : ?>
            <?php foreach ($element as $page => $url) : ?>
                <?php if ($page == $paginator->currentPage()) : ?>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $page; ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="<?php echo $url; ?>"><?php echo $page; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <!-- Next Page Link -->
    <?php if ($paginator->hasMorePages()) : ?>
        <li class="page-item"><a class="page-link" href="<?php echo $paginator->nextPageUrl(); ?>" rel="next">&raquo;</a></li>
    <?php else : ?>
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">&raquo;</a></li>
    <?php endif; ?>
</ul>