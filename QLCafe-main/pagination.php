<?php
//AI
if (!isset($totalProducts) || !isset($productsPerPage) || !isset($currentPage)) {
    die("Thiếu thông tin cần thiết cho phân trang!");
}
$totalPages = ceil($totalProducts / $productsPerPage);
?>
<nav aria-label="Page navigation" class="mt-4">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($currentPage <= 1) echo 'disabled'; ?>">
            <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" tabindex="-1">Trang trước</a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?php if ($currentPage >= $totalPages) echo 'disabled'; ?>">
            <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Trang kế tiếp</a>
        </li>
    </ul>
</nav>
