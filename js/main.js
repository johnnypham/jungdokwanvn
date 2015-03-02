/**
 *
 * HTML5 Audio player with playlist
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Script Tutorials
 * http://www.script-tutorials.com/
 */
jQuery(document).ready(function() {

    // inner variables
    var song;
    var tracker = $('.tracker');
    var volume = $('.volume');

    function initAudio(elem) {
        var url = elem.attr('audiourl');
        var title = elem.text();
        var cover = elem.attr('cover');
        var artist = elem.attr('artist');

        $('.player .title').text(title);
        $('.player .artist').text(artist);
        $('.player .cover').css('background-image','url(data/' + cover+')');;

        song = new Audio(url);

        // timeupdate event listener
        song.addEventListener('timeupdate',function (){
            var curtime = parseInt(song.currentTime, 10);
            tracker.slider('value', curtime);
        });

        $('.playlist li').removeClass('active');
        elem.addClass('active');
    }
    function playAudio() {
        song.play();
    console.log(song.duration);
         console.log(song.currentTime);

         song.ontimeupdate = function() {update_time()};
        tracker.slider("option", "max", song.duration);

        $('.play').addClass('hidden');
        $('.pause').addClass('visible');
    }
    function update_time(){
        $('.current-time').text(Math.round(song.currentTime)) ;
        $('.duration-time').text(Math.round(song.duration - song.currentTime)) ;
      
    }
    function stopAudio() {
        song.pause();

        $('.play').removeClass('hidden');
        $('.pause').removeClass('visible');
    }

    // play click
    $('.play').click(function (e) {
        e.preventDefault();

        playAudio();
    });

    // pause click
    $('.pause').click(function (e) {
        e.preventDefault();

        stopAudio();
    });

    // forward click
    $('.fwd').click(function (e) {
        e.preventDefault();

        stopAudio();

        var next = $('.playlist li.active').next();
        if (next.length == 0) {
            next = $('.playlist li:first-child');
        }
        initAudio(next);
    });

    // rewind click
    $('.rew').click(function (e) {
        e.preventDefault();

        stopAudio();

        var prev = $('.playlist li.active').prev();
        if (prev.length == 0) {
            prev = $('.playlist li:last-child');
        }
        initAudio(prev);
    });

    // show playlist
    $('.pl').click(function (e) {
        e.preventDefault();

        $('.playlist').fadeIn(300);
    });

    // playlist elements - click
    $('.playlist li').click(function () {
        stopAudio();
        initAudio($(this));
    });

    // initialization - first element in playlist
    initAudio($('.playlist li:first-child'));

    // set volume
    song.volume = 0.8;

    // initialize the volume slider
    volume.slider({
        range: 'min',
        min: 1,
        max: 100,
        value: 80,
        start: function(event,ui) {},
        slide: function(event, ui) {
            song.volume = ui.value / 100;
        },
        stop: function(event,ui) {},
    });

    // empty tracker slider
    tracker.slider({
        range: 'min',
        min: 0, max: 10,
        start: function(event,ui) {},
        slide: function(event, ui) {
            song.currentTime = ui.value;
        },
        stop: function(event,ui) {}
    });

    jQuery('#inline').fancybox();
    jQuery('#sdada').on('click',function(event){
       event.preventDefault() 
          //validateForm();
            var search_select =jQuery('select.textbox100').val().toLowerCase();
            var search_name= jQuery('input.textbox100').val().toLowerCase().replace(/\s/g, '');
            var search_nationality= jQuery('.textbox1001').val().replace(/\s/g, '').toLowerCase();
            var search_dd= jQuery('#cmbTel').val().toLowerCase();
            var search_mm= jQuery('#cmbCity').val().toLowerCase();
            var search_yy= jQuery('#cmbCountry').val().toLowerCase();
            var search_date = (search_dd+'/'+search_mm+'/'+search_yy).replace(/\s/g, '')
            var search_all=search_name+search_nationality+search_date;
            jQuery('.table-responsive-1').hide();
            var search_result = new Array();
            jQuery('.table-responsive-1').each(function(index){
                var string_name = jQuery(this).find('.name').text().toLowerCase().replace(/\s/g, '');
                var string_pon = jQuery(this).find('.poom_dan_no').text().toLowerCase().replace(/\s/g, '');
                var string_date = jQuery(this).find('.date').text().toLowerCase().replace(/\s/g, '');
                var string_natina = jQuery(this).find('.natinality').text().toLowerCase().replace(/\s/g, '');
                var string_all = string_name+string_natina+string_date;
                 if(search_select =='name'){
                        string_all = string_name+string_natina+string_date;
                 }else{
                        string_all = string_pon+string_natina+string_date;
                    }
                if(string_all.indexOf(search_all) != -1){
                    search_result.push(jQuery(this).attr('id'))
                }
                search_result.forEach(function(table){
                    var a =jQuery('#' + table).show();
                       
                    })
            })
    })




/*********************************************** 
***********************************************/
var scrolltotop={ 
    //startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control 
    //scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top). 
    setting: {startline:100, scrollto: 0, scrollduration:1000, fadeduration:[500, 100]},
    controlHTML: '<img src="http://jetcoffee.vn/html-CODE/images/btn-back-top.png" />', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol" 
    controlattrs: {offsetx:5, offsety:5}, //offset of control relative to left/ bottom of window corner 
    anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links
    state: {isvisible:false, shouldvisible:false},
    scrollup:function(){ 
        if (!this.cssfixedsupport) //if control is positioned using JavaScript 
            this.$control.css({opacity:0}) //hide control immediately after clicking it 
        var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto) 
        if (typeof dest=="string" && jQuery('#'+dest).length==1) //check element set by string exists 
            dest=jQuery('#'+dest).offset().top 
        else 
            dest=0 
        this.$body.animate({scrollTop: dest}, this.setting.scrollduration); 
    },
    keepfixed:function(){ 
        var $window=jQuery(window) 
        var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx 
        var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety 
        this.$control.css({right:controlx+'px', top:controly+'px'}) 
    },
    togglecontrol:function(){ 
        var scrolltop=jQuery(window).scrollTop() 
        if (!this.cssfixedsupport) 
            this.keepfixed() 
        this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false 
        if (this.state.shouldvisible && !this.state.isvisible){ 
            this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0]) 
            this.state.isvisible=true 
        } 
        else if (this.state.shouldvisible==false && this.state.isvisible){ 
            this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1]) 
            this.state.isvisible=false 
        } 
    }, 
    
    init:function(){ 
        jQuery(document).ready(function($){ 
            var mainobj=scrolltotop 
            var iebrws=document.all 
            mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode 
            mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body') 
            mainobj.$control=$('<div id="topcontrol">'+mainobj.controlHTML+'</div>') 
                .css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'}) 
                .attr({title:'Scroll Back to Top'}) 
                .click(function(){mainobj.scrollup(); return false}) 
                .appendTo('body') 
            if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') //loose check for IE6 and below, plus whether control contains any text 
                mainobj.$control.css({width:mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text 
            mainobj.togglecontrol() 
            $('a[href="' + mainobj.anchorkeyword +'"]').click(function(){ 
                mainobj.scrollup() 
                return false 
            }) 
            $(window).bind('scroll resize', function(e){ 
                mainobj.togglecontrol() 
            }) 
        }) 
    } 
}
scrolltotop.init()

// JavaScript Document
    function validateForm() {
        //Họ phải được điền
        var ho = document.forms["myForm"]["keyword"].value;
        if (ho == "") {
            alert("Nhập thông tin Họ tên/Poom/Dan No.");
            return false;
        }

        //Họ phải được điền
        var ho = document.forms["myForm"]["keyword"].value;
        if (ho == "Enter...") {
            alert("Nhập thông tin Họ tên/Poom/Dan No.");
            return false;
        }
        //Tên phải được điền
        var ten = document.forms["myForm"]["keyword2"].value;
        if (ten == "") {
            alert("Lựa chọn quốc tịch");
            return false;
        }

    //Tên phải được điền
        var ngaysinh = document.forms["myForm"]["cmbTel"].value;
        if (ngaysinh == "") {
            alert("Lựa chọn ngày sinh");
            return false;
        }

 //Tên phải được điền
        var thangsinh = document.forms["myForm"]["cmbCity"].value;
        if (thangsinh == "") {
            alert("Lựa chọn tháng sinh");
            return false;
        }


 //Tên phải được điền
        var namsinh = document.forms["myForm"]["cmbCountry"].value;
        if (namsinh == "") {
            alert("Lựa chọn năm sinh");
            return false;
        }


        //Email phải được điền chính xác
        var email=document.forms["myForm"]["email"].value;
        var aCong=email.indexOf("@");
        var dauCham = email.lastIndexOf(".");
        if (email == "") {
            alert("Email không được để trống");
            return false;
        }
        else if ((aCong<1) || (dauCham<aCong+2) || (dauCham+2>email.length)) {
              alert("Email bạn điền không chính xác");
              return false;
          }
          //Nhập số điện thoại
          var dienThoai = document.forms["myForm"]["dienThoai"].value;
          var kiemTraDT = isNaN(dienThoai);
          if (dienThoai == "") {
              alert("Điện thoại không được để trống");
              return false;
          }
          if (kiemTraDT == true) {
              alert("Điện thoại phải để ở định dạng số");
              return false;
          }
          //Nhập số lượng muốn mua
          var soLuong = document.forms["myForm"]["soLuong"].value;
          var kiemTraSL = isNaN(soLuong);
          if ((soLuong == "") || (soLuong <= 0)) {
              alert("Số lượng không được để trống và phải lớn hơn 0");
              return false;
          }
          if (soLuong > 100) {
              alert("Số lượng mua không được lớn hơn 100");
              return false;
          }
          if (kiemTraSL == true) {
              alert("Số lượng mua phải để ở định dạng số");
              return false;
          }
          //Chọn ngày nhận hàng
   var nm = document.forms["myForm"]["ngaymua"].value;
   if (nm == "") {
    alert("Ngày không được để trống");
    return false;
    }
    //Chọn kiểu thanh toán
          var ck = document.getElementById("ck");
          var tt = document.getElementById("tt");
    if ((ck.checked == false) && (tt.checked == false)) {
     alert("Bạn phải chọn một kiểu thanh toán");
     return false;
     }
}
jQuery('.button345689').on('click',function(){
validateForm();

})
                 
$('.carousel-video').carousel({
  interval: false
})

$('.carousel-video .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
jQuery('.changeurl').on('click',function(events){
    events.preventDefault()

    $('#post-video-current').find('iframe').attr('src',jQuery(this).attr('data-id'));
    $('#post-video-current').find('h3').text(jQuery(this).attr('data-title'));
    $('#post-video-current').find('#video_content').html(jQuery(this).attr('data-content'));
    $('#post-video-current').find('#video-time').text(jQuery(this).attr('data-date'));
    $('#post-video-current').find('#video-author').html(jQuery(this).attr('data-author'));

 
})

$(window).scroll(function(){
  if($(window).width()> 1000){
    var location = $(this).scrollTop()
    var height_win =$(this).height();
    var height_document=$(document).height();
    var height_footer=$('.page-template-page-video-new #footer').height();
    var height_header=$('.page-template-page-video-new #header').height();
    var abc=height_document-height_win-height_footer;
    if(location > height_header) {

      $('#video-left').addClass('video-fixed');
        if(location >= abc){
            $('#video-left').removeClass('video-fixed');
            $('#video-left').addClass('video-fixed-2');
            $('#video-left').css('top',-(location-abc)+'px')
        }
    }
    else{
        $('#video-left').removeClass('video-fixed');
        $('#video-left').removeClass('video-fixed-2');
        $('#video-left').css('top','20px')
    }
      
 }

});
   });