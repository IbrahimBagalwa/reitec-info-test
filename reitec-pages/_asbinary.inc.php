<?php $src = $contt->extra ?? '_dav.me_190901609694047.pdf'; ?>
<div class="col-md-11  col-11 bg-transparent px-0 position-absolute" style="height: 650px;z-index:1"></div>
<div class="col-md-12 col-12 bg-prmy px-0 shadow" style="height: 650px">
    <embed src="reitec-files/inner/<?php echo($src); ?>#toolbar=0" type="application/pdf" class="w-100" style="height: 650px">
</div>
<!-- <script>
    $(document).on('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && (e.key === "p" || e.key === "c" || e.charCode === 16 || e.charCode === 112 || e.keyCode === 80)) {
        e.cancelBubble = true;
        e.preventDefault();
        e.stopImmediatePropagation();
        return false;
    }
    });
</script> -->