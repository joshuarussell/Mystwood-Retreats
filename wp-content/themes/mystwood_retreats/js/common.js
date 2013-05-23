$(document).ready(function() {

  /**
   * Carousel
   */

  var num_items = $('#carousel .item').length;

  // Next Button
  $('#carousel-controls a[href="#next"]').click(function() {
    if(!$('#carousel .item').is(':animated')) {
      var current_item  = $('#carousel .item:visible');
      var next          = $('#carousel .item:visible').next();

      $('#carousel-pager li').removeClass('current');

      current_item.fadeOut(300);

      if(num_items === current_item.index() + 1) {
        $('#carousel .item').first().fadeIn(300);
        $('#carousel-pager li').first().addClass('current');
      } else {
        next.fadeIn(300);
        $('#carousel-pager li').eq(next.index()).addClass('current');
      }
    }
    return false;
  });

  // Previous Button
  $('#carousel-controls a[href="#prev"]').click(function() {
    if(!$('#carousel .item').is(':animated')) {
      var current_item  = $('#carousel .item:visible');
      var next          = $('#carousel .item:visible').prev();

      $('#carousel-pager li').removeClass('current');

      current_item.fadeOut();

      if(current_item.index() + 1 === 1) {
        $('#carousel .item').last().fadeIn(300);
        $('#carousel-pager li').last().addClass('current');
      } else {
        next.fadeIn(300);
        $('#carousel-pager li').eq(next.index()).addClass('current');
      }
    }
    return false;
  });

  // Build pager
  for(var i = 1; i <= num_items; i++) {
    $('#carousel-pager').append('<li' + ((i === 1) ? ' class="current"' : '') + '><a href="#' + i + '">' + i + '</a></li>');
  }

  // Click pager item
  $('#carousel-pager li a').click(function() {
    if(!$('#carousel .item').is(':animated')) {
      if(!$(this).parent().hasClass('current')) {
        var index         = $(this).attr('href').replace('#', '') - 1;
        var current_item  = $('#carousel .item:visible');

        $('#carousel-pager li').removeClass('current');
        $(this).parent().addClass('current');

        current_item.fadeOut(300);

        $('#carousel .item').eq(index).fadeIn(300);
      }
    }
    return false;
  });

});