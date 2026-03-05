<?php
$nav_colour = $args['nav_colour'];

$class_list = '';
if ($nav_colour) {
    $class_list .= ' text-' . $nav_colour;
}
?>

<div class="swiper-nav flex gap-16 items-center justify-center <?php echo $class_list; ?>">
    <button class="swiper-btn swiper-btn-prev">
        <svg width="41" height="66" viewBox="0 0 41 66" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M38.3721 2.24023C35.3851 -0.746744 30.5417 -0.746744 27.5547 2.24023L2.23926 27.5557C0.736702 29.0582 -0.00912094 31.0307 0 33C-0.00905228 34.9692 0.736855 36.9409 2.23926 38.4434L27.5547 63.7598C30.5417 66.7467 35.3851 66.7467 38.3721 63.7598C41.3588 60.7729 41.3587 55.9303 38.3721 52.9434L18.4287 33L38.3721 13.0566C41.3588 10.0697 41.3588 5.22717 38.3721 2.24023Z" fill="#05063E"/>
        </svg>
    </button>
    <button class="swiper-btn swiper-btn-next">
        <svg width="41" height="66" viewBox="0 0 41 66" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.23999 63.7598C5.22697 66.7467 10.0704 66.7467 13.0574 63.7598L38.3728 38.4443C39.8754 36.9418 40.6212 34.9693 40.6121 33C40.6211 31.0308 39.8752 29.0591 38.3728 27.5566L13.0574 2.24024C10.0704 -0.746743 5.22698 -0.746743 2.24 2.24023C-0.746764 5.22711 -0.746605 10.0697 2.24 13.0566L22.1834 33L2.23999 52.9434C-0.746771 55.9303 -0.746764 60.7728 2.23999 63.7598Z" fill="#05063E"/>
        </svg>
    </button>
</div>