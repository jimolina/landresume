var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

jQuery(document).ready(function($){

  $( '#navbarHeader ul li:first' ).addClass( 'active' );

  function animationHome () {
    $( '#menuHome' ).removeClass( 'bg-faded' );
    $( '#menuHome' ).addClass( 'animated slideInDown' );
    $( '#info #title' ).addClass( 'animated fadeInLeft' );
    $( '#info #title_sup' ).addClass( 'animated fadeInRight' );
    $( '.bubble' ).addClass( 'animated jello' );
    $( '#icons li' ).addClass( 'animated fadeInUp' ).one(animationEnd, function() {
      setTimeout(function() {
        $( '#menuHome' ).removeClass( 'animated slideInDown' );
        $( '#info #title' ).removeClass( 'animated fadeInLeft' );
        $( '#info #title_sup' ).removeClass( 'animated fadeInRight' );
        $( '#icons li' ).removeClass( 'animated fadeInUp' );
        $( '.bubble' ).removeClass( 'animated jello' );
      }, 1000);
    });
  }

  var $window = $(window),
      UrlFor = "",
      Url = "";

  if ( navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1 ) {
    $( 'body' ).addClass( 'safari' );
  };

  animationHome();

  var sildeNum = $( '.page' ).length,
      wrapperWidth = 100 * sildeNum,
      slideWidth = 100/sildeNum;

  $( '.wrapper' ).width(wrapperWidth + '%'); 
  $( '.page' ).width(slideWidth + '%');

  $( 'a.scrollitem' ).click(function() {
    var actualPage = $( 'a.scrollitem.selected' ).attr( 'href' );

    $( 'a.scrollitem' ).parent().removeClass( 'active' );
    $( this ).parent().addClass('active');
    $( 'a.scrollitem' ).removeClass( 'selected' );
    $( this ).addClass( 'selected' );

    var slideNumber = $( $( this ).attr( 'href' )).index( '.page' ),
        margin = slideNumber * -100 + '%';
    if ( (actualPage === '#home') && (slideNumber !== 0) ) {
      $( '#menuHome' ).addClass( 'animated fadeOutLeft' );
      $( '.content-picture' ).addClass( 'animated fadeInUp' );
      setTimeout(function() {
        $( '#menuHome' ).removeClass( 'animated fadeOutLeft' );
        $( '.content-picture' ).removeClass( 'animated fadeInUp' );
        $( '#menuHome' ).addClass( 'animated fadeInDown bg-faded' );
        setTimeout(function() {
          $( '#menuHome' ).removeClass( 'animated fadeInDown' );

        }, 1000);
      }, 2000);
    } else if ( (actualPage !== '#home') && (slideNumber === 0) ) {
      animationHome();    
    }

    $( '.wrapper' ).animate({marginLeft: margin},1000);
    $( '.navbar-collapse' ).collapse('hide');
    return false;
  });

  $( '.portfolio-grid li' ).hover(function() {
    $( this ).children('.shadow').fadeIn();
  }, function() {
    $( this ).children('.shadow').fadeOut();
  });

  $( '.portfolio_nav button.previous' ).click(function() {
    var LiId = $( this ).attr('data-previous');
    $( '#portfolioModal' ).modal('hide');
    
    setTimeout(function() {
      $( '.portfolio-grid li.' + LiId ).trigger('click');
    }, 450);
  });

  $( '.portfolio_nav button.next' ).click(function() {
    var LiId = $( this ).attr('data-next');
    $( '#portfolioModal' ).modal('hide');

    setTimeout(function() {
      $( '.portfolio-grid li.' + LiId ).trigger('click');
    }, 450);
  });

  $( '.portfolio-grid li' ).click(function() {
    $( '#portfolioModal .modal-header .previous' ).attr('data-previous', $(this).children('.shadow').attr('data-previous'));
    $( '#portfolioModal .modal-header .next' ).attr('data-next', $(this).children('.shadow').attr('data-next'));
    $( '#portfolioModal .modal-body .title' ).text($(this).children('.shadow').attr('data-title'));
    $( '#portfolioModal .modal-body .avatar' ).attr('src', $(this).children('img').attr('src'));
    $( '#portfolioModal .modal-body .description' ).text($(this).children('.shadow').attr('data-description'));
    $( '#portfolioModal .modal-body .date' ).text($(this).children('.shadow').attr('data-date'));
    $( '#portfolioModal .modal-body .categories' ).text($(this).children('.shadow').attr('data-categories'));

    if ( $(this).children('.shadow').attr('data-for-url') !== "" ) {
      UrlFor = "<a href='" + $(this).children('.shadow').attr('data-for-url') + "' target='_Blank'>" + 
                $(this).children('.shadow').attr('data-for') + "</a>"

      if ( $(this).children('.shadow').attr('data-as') !== "" ) {
        UrlFor += " <small>as " + $(this).children('.shadow').attr('data-as') + "</small>";
      }
    } else {
      UrlFor = $(this).children('.shadow').attr('data-for');
    }

    $( '#portfolioModal .modal-body .for' ).html(UrlFor);

    if ( $(this).children('.shadow').attr('data-url') !== "" ) {
      Url = $(this).children('.shadow').attr('data-url');
      $( '#portfolioModal .modal-body .url' ).removeClass('disabled');
    } else {
      Url = "";
      $( '#portfolioModal .modal-body .url' ).addClass('disabled');
    }

    $( '#portfolioModal .modal-body .url' ).attr('href', Url);

    $( '#portfolioModal' ).modal('show');
  });

});