
// Date/time display
function updateDateTime(){
  const d = new Date();
  document.getElementById('datetime').textContent = d.toLocaleString();
}
updateDateTime();
setInterval(updateDateTime, 1000);

// Bootstrap form validation (example)
(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      } else {
        // show friendly message then allow submit to server
        document.getElementById('form-msg').innerHTML = '<div class="alert alert-success">Submitting...</div>';
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
