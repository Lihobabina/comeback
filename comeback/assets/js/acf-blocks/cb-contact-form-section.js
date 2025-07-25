document.querySelector('.cb-file-input').addEventListener('change', function (e) {
  const list = document.getElementById('file-preview-list');
  list.innerHTML = '';

  Array.from(e.target.files).forEach((file, index) => {
    const li = document.createElement('li');
    li.innerHTML = `
      ${file.name}
      <button type="button" data-index="${index}">&times;</button>
    `;
    list.appendChild(li);
  });

  document.querySelectorAll('#file-preview-list button').forEach(button => {
    button.addEventListener('click', function () {
      const filesInput = document.querySelector('.cb-file-input');
      const dt = new DataTransfer();

      Array.from(filesInput.files).forEach((file, i) => {
        if (i !== parseInt(this.dataset.index)) {
          dt.items.add(file);
        }
      });

      filesInput.files = dt.files;
      filesInput.dispatchEvent(new Event('change'));
    });
  });
});
