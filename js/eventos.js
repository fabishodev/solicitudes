/*  eventos.js
 */
var aspaaug = window.aspaaug || {};
aspaaug.eventos = (function() {
  var base_url = "http://localhost/solicitudes/";
  return {
    ejemplo_click: function() {
      $(document).on('click', '#btn-informacion', function(e) {
        alert('click');
      });
    }
  }
})();
