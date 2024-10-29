'use strict';{
    const hamburger = document.querySelector('.js-hamburger');
    const gmenu = document.querySelector(".p-gmenu");
    const mask = document.querySelector(".mask");
    
    
    //ハンバーガーボタン＆メニュースライド
    $(function() {
        $(hamburger).on('click', function() {
            $(this).toggleClass("is-open");
            $(gmenu).toggleClass("is-open");
            $(mask).toggleClass("is-open");
            $("body").toggleClass("is-open");
            // $(gmenu).slideToggle(200);
        });
        $(mask).on('click', function() {
            $(this).removeClass("is-open");
            $(gmenu).removeClass("is-open");
            $(hamburger).removeClass("is-open");
            $("body").removeClass("is-open");
            // $(gmenu).slideToggle(200);
        });
    });
    

    //画像インビュー
    $(window).on('scroll',function(){
        $('.inview').each(function(){
            let targetPosition = $(this).offset().top;
            let scroll = $(window).scrollTop();
            let windowHeight = $(window).height();
            if(scroll > targetPosition - windowHeight){
                $(this).addClass('show');
            }
        });
    });

    $(window).on('load',function(){
        $('.inview').each(function(){
            let targetPosition = $(this).offset().top;
            let scroll = $(window).scrollTop();
            let windowHeight = $(window).height();
            if(scroll > targetPosition - windowHeight){
                $(this).addClass('show');
            }
        });
    });



    //ページ推移アニメーション
    $(function(){
        $('body').fadeMover({
            'effectType': 3,     //1:フェードイン&&フェードアウト　2:フェードインのみ　3:フェードアウトのみ
            'inSpeed': 300,      //フェードインのスピード
            'outSpeed': 300,     //フェードアウトのスピード
            'inDelay' : '0',     //フェードイン遅延スピード。複数要素がある場合、順番にフェードイン。0で遅延なし。
            'outDelay' : '0',    //フェードアウト遅延スピード。複数要素がある場合、順番にフェードイン。0で遅延なし。
            'nofadeOut' : 'nonmover'  //ページ内リンクの指定をしている<a>タグはフェードアウト動作禁止。それ以外の<a>タグでフェードアウト動作させたくない場合のclass名を指定。
        });
    });

    

    //TOPへ戻るボタン
    $(function(){
        const pagetop = $('#page-top');
        pagetop.hide();
        $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
                pagetop.fadeIn(200);
        } else {
                pagetop.fadeOut(100);
        }
        });
        pagetop.click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500);
        return false;
        });
    });

    

    $(function() {
        $('.detail-u').matchHeight();
        $('.detail-d').matchHeight();
        $('.p-home__detail--wrap').matchHeight();
    });
  
  
}