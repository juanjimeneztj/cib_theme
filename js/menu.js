let $mnuMain = $('.navigation-header'), $mnuMainBtn = $('.mobile-mnu'), $win = $(window), $doc = $(document), $mnuStatus = 0;

$doc.ready(function(){
    if($win.width()>1200){
        $mnuMainBtn.removeClass('gsweb-active');
        $mnuMain.removeClass('mnuMobile active');
    }else{
        $mnuMainBtn.addClass('gsweb-active');
        $mnuMain.addClass('mnuMobile');
        $mnuMain.removeClass('active');
        $mnuMainBtn.removeClass('gsweb-enabled');
        $mnuStatus = 0;
    }
});

$mnuMainBtn.click(function(){
    if($mnuStatus == 0){
        $mnuMainBtn.addClass('gsweb-enabled');
        $mnuMain.addClass('active');
        $mnuStatus = 1;
    }else{
        $mnuMainBtn.removeClass('gsweb-enabled');
        $mnuMain.removeClass('active');
        $mnuStatus = 0;
    }
});

$win.resize(function(){
    if($win.width()>1200){
        $mnuMainBtn.removeClass('gsweb-active');
        $mnuMain.removeClass('mnuMobile active');
    }else{
        $mnuMain.addClass('mnuMobile');
        $mnuMainBtn.addClass('gsweb-active');
        $mnuMain.removeClass('active');
        $mnuMainBtn.removeClass('gsweb-enabled');
        $mnuStatus = 0;
    }
});