 document.addEventListener('DOMContentLoaded', function() {
              const forms = document.querySelectorAll('.needs-validation');

              Array.prototype.slice.call(forms).forEach(function(form) {
                  form.setAttribute('novalidate', 'novalidate');

                  form.addEventListener('submit', function(event) {
                      if (!form.checkValidity()) {
                          event.preventDefault();
                          event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                  })
              })
          })