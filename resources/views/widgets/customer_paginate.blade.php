<?php
extract($config);
$last = ceil($total / $limit);
$links = ($page - 1 < 1) || ($last - $page < 1) ? 2 : 1;
$start = $page - $links > 0 ? $page - $links : 1;
$end = $page + $links < $last ? $page + $links : $last;
$html = '<ul class="paginate" id="paginate-page">';
$class = $page == 1 ? 'disabled' : '';
$html .= '<li class="' . $class . '"><a href="?limit=' . $limit . '&page=' . ($page - 1) . '" data-page="' . ($page - 1) . '">&laquo;</a></li>';
if ($start > 2) {
    $html .= '<li><a href="?limit=' . $limit . '&page=1" data-page="1">1</a></li>';
    $html .= '<li class="disabled"><span>...</span></li>';
}
for ($i = $start; $i <= $end; $i++) {
    $class = $page == $i ? 'active' : '';
    $html .= '<li class="' . $class . '"><a href="?limit=' . $limit . '&page=' . $i . '" data-page="' . ($i) . '">' . $i . '</a></li>';
}
if ($end < $last) {
    $html .= '<li class="disabled"><span>...</span></li>';
    $html .= '<li><a href="?limit=' . $limit . '&page=' . $last . '" data-page="' . $last . '">' . $last . '</a></li>';
}
$class = $page == $last ? 'disabled' : '';
$html .= '<li class="' . $class . '"><a href="?limit=' . $limit . '&page=' . ($page + 1) . '"data-page="' . ($page + 1) . '">&raquo;</a></li>';
$html .= '</ul>';
die($html);
?>
