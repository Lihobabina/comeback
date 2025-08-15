document.addEventListener('DOMContentLoaded', function () {
  const fileInputs = document.querySelectorAll('.cb-file-input');
  const form = document.getElementById('cb-apply-form');
  if (!form) return;

  const submitButton = form.querySelector('button[type="submit"]');
  if (!submitButton) return;

  const loader = document.createElement('div');
  loader.className = 'cb-loader';
  loader.style.display = 'none';

  const logoImg = document.createElement('img');
  logoImg.src = 'https://www.comeback.ua/wp-content/uploads/2025/08/ccome.png';
  loader.appendChild(logoImg);

  form.appendChild(loader);

  fileInputs.forEach(input => {
    input.addEventListener('change', function () {
      const fileNameDisplay = this.closest('div').querySelector('.cb-file-name');
      if (this.files.length > 0) {
        fileNameDisplay.textContent = this.files[0].name;
      } else {
        fileNameDisplay.textContent = fileNameDisplay.getAttribute('data-placeholder') || '';
      }
    });
  });

  const params = new URLSearchParams(window.location.search);
  const source = params.get('source');
  if (source) {
    const sourceField = document.getElementById('sourceField');
    if (sourceField) sourceField.value = source;
  }

  form.addEventListener('submit', async function (e) {
    if (submitButton.classList.contains('sent')) {
      e.preventDefault();
      return;
    }

    e.preventDefault();

    if (typeof Pace !== 'undefined' && Pace && typeof Pace.restart === 'function') {
      Pace.restart();
    }

    const formData = new FormData(form);
    formData.append('action', 'cb_apply_form_submit');
    formData.append('security', cbFormData.security);
    formData.append('vacancy_relationship', cbFormData.vacancy_post_id);
    formData.append('position', cbFormData.vacancy_post_title);

    submitButton.disabled = true;
    loader.style.display = 'flex';

    let success = false;

    try {
      const response = await fetch(cbFormData.ajaxurl, {
        method: 'POST',
        body: formData
      });

      const result = await response.json();
      success = !!result?.success;

      if (success) {
        form.reset();
        document.querySelectorAll('.cb-file-name').forEach(el => {
          el.textContent = el.getAttribute('data-placeholder') || '';
        });
      }
    } catch (error) {
      success = false;
    } finally {
      setTimeout(() => {
        loader.style.display = 'none';
        setTimeout(() => {
          if (success) {
            submitButton.textContent = 'Application sent!';
            submitButton.classList.add('sent');
            setTimeout(() => {
              submitButton.innerHTML = '<div class="icon"></div>Apply Now';
              submitButton.disabled = false;
              submitButton.classList.remove('sent');
            }, 5000);
          } else {
            submitButton.disabled = false;
          }
        }, 500);
      }, 1500);
    }
  });
});

document.addEventListener('DOMContentLoaded', function () {
    const applyBtn = document.querySelector('.cb-job-info-apply-btn');
    if (!applyBtn) return;

    applyBtn.addEventListener('click', function () {
        document.querySelector('#cb-apply-form')?.scrollIntoView({ behavior: 'smooth' });
    });
});
	  