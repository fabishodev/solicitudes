/*  eventos.js
 */
var aspaaug = window.aspaaug || {};
aspaaug.eventos = (function() {
  var base_url = "";
  return {
    ejemplo_click: function() {
      $(document).on('click', '#btn-informacion', function(e) {
        alert('click');
      });
    }
  }
})();
