const modalBtn = document.getElementById('modal-btn');

modalBtn.addEventListener('click', (event) => {
    document.body.classList.toggle('modal-open');
});