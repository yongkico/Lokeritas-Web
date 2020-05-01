(function() {
  const form = document.querySelector('#form-daftar');
  const checkboxes = form.querySelectorAll('input[type=checkbox]');
  const checkboxLength = checkboxes.length;
  const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

  function init() {
      if (firstCheckbox) {
          for (let i = 0; i < checkboxLength; i++) {
              checkboxes[i].addEventListener('change', checkValidity);
          }

          checkValidity();
      }
  }

  function isChecked() {
      for (let i = 0; i < checkboxLength; i++) {
          if (checkboxes[i].checked) return true;
      }

      return false;
  }

  function checkValidity() {
      const errorMessage = !isChecked() ? 'Pilih minimal 1 jenis disabilitas.' : '';
      firstCheckbox.setCustomValidity(errorMessage);
  }

  init();
})();