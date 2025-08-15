document.addEventListener('DOMContentLoaded', () => {
  const fileInput = document.querySelector('.cb-file-input');
  const list = document.getElementById('file-preview-list');
  const form = document.querySelector('#cb-contact-form');
  if (!form) return;

  const submitButton = form.querySelector('button[type="submit"]');
  const loader = document.createElement('div');

  if (!fileInput || !form || !list || !submitButton) return;

  loader.className = 'cb-loader';
  loader.style.display = 'none';
  loader.innerHTML = `<div class="spinner"></div>`;
  form.appendChild(loader);

  fileInput.addEventListener('change', function (e) {
    list.innerHTML = '';

    Array.from(e.target.files).forEach((file, index) => {
      const li = document.createElement('li');
      li.innerHTML = `
        ${file.name}
        <button type="button" data-index="${index}">&times;</button>
      `;
      list.appendChild(li);
    });

    list.querySelectorAll('button').forEach(button => {
      button.addEventListener('click', function () {
        const dt = new DataTransfer();

        Array.from(fileInput.files).forEach((file, i) => {
          if (i !== parseInt(this.dataset.index, 10)) {
            dt.items.add(file);
          }
        });

        fileInput.files = dt.files;
        fileInput.dispatchEvent(new Event('change'));
      });
    });
  });

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    formData.append('action', 'cb_send_form');
    formData.append('nonce', cbFormAjax.nonce);

    loader.style.display = 'flex';
    submitButton.disabled = true;

    try {
      const response = await fetch(cbFormAjax.ajax_url, {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        submitButton.textContent = 'Message sent!';
        submitButton.disabled = true;
        form.reset();
        list.innerHTML = '';

        setTimeout(() => {
          submitButton.textContent = 'Send Now';
          submitButton.disabled = false;
        }, 5000);
      } else {
        submitButton.textContent = 'Send Now';
        submitButton.disabled = false;
      }
    } catch (error) {
      submitButton.textContent = 'Send Now';
      submitButton.disabled = false;
    } finally {
      loader.style.display = 'none';
    }
  });
});


