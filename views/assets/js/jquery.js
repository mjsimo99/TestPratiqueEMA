$(document).ready(function() {
    function updateSpeedValue() {
      const value = $("#speed-range").val();
      const speed = value < 1000 ? `${value} MB/s` : `${(value / 1000).toFixed(2)} GB/s`;
      $("#speed-value").text(speed);
    }
  
    $("#speed-range").on("input", function() {
      updateSpeedValue();
    });
  
    updateSpeedValue();
  });




    $(document).ready(function() {
        $('input[type="radio"]').change(function() {
            var selectedOption = $(this).val();
            $(this).closest('td').text(selectedOption);
        });
    });
