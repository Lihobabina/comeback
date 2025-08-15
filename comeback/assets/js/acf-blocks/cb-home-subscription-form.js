document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('#cb-subscription-form');
  if (!form) return;

  const submitButton = form.querySelector('button[type="submit"]');
  if (!submitButton) return;

  const btnText = submitButton.querySelector('span.btn-text');
  if (!btnText) return;

  const loader = document.createElement('div');
  loader.className = 'cb-loader';
  loader.style.display = 'none';
  loader.innerHTML = `<div class="spinner"></div>`;
  form.appendChild(loader);

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    formData.append('action', 'cb_send_subscription_form');
    formData.append('nonce', cbFormAjax.nonce);

    loader.style.display = 'flex';
    submitButton.disabled = true;

    const originalText = btnText.textContent;

    try {
      const response = await fetch(cbFormAjax.ajax_url, {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        btnText.textContent = 'Subscribed!';
        form.reset();

        setTimeout(() => {
          btnText.textContent = originalText;
          submitButton.disabled = false;
        }, 5000);
      } else {
        btnText.textContent = originalText;
        submitButton.disabled = false;
      }
    } catch (error) {
      btnText.textContent = originalText;
      submitButton.disabled = false;
    } finally {
      loader.style.display = 'none';
    }
  });
});
