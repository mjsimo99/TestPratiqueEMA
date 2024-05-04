$(document).ready(function(){
  $('.speed-range').each(function() {
      var maxValue = parseInt($(this).attr('max'));
      var stepSize = maxValue / 1000;
      $(this).attr('max', maxValue);
      $(this).attr('step', stepSize);
      $(this).on('input', function() {
          var value = $(this).val();
          var speed = formatSpeed(value);
          $(this).closest('.td').find('.selected-range').text(speed);
      });
  });

  function formatSpeed(value) {
      if (value >= 1000) {
          return Math.round(value / 1000) + " Gb/s";
      } else {
          return Math.round(value) + " Mb/s";
      }
  }
});




