<?php
function formatAngka($angka){
    return number_format($angka, 0, ".", ".");
}

function formatAngkaDesimal($angka){
    return number_format($angka, 2, ".", ".");
}
?>