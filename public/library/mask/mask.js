(function ($) {
  'use strict';

  $.mask.definitions['~'] = '[+-]';

  $('#ssn').mask('999-99-9999');
})(jQuery);