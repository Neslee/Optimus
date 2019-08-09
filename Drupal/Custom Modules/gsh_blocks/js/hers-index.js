/**
 * @file
 * JS file for Hers Index.
 */

(function ($) {
$(document).ready(function () {
var herIndexValue = $('#herValue').text();
$('#herIndex').val(herIndexValue);
// Her Section Configuration
$('.range').rangeControl({
  min: 0,
  max: 150,
  delim: ',',
  orientation: 'horizontal',
  disabled: true,
  rangeType: 'single',
  stepsPerPage: 10,
  currentValue: {
    position: 'top'
  },
  scale: {
    position: 'bottom',
    labels: true,
    interval: 10
  },
  className: ''
});
});
})(jQuery);