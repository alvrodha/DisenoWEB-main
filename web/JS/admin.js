const btnAdd = document.getElementById("modal-btn-add");
const modalAdd = document.getElementById("modal-add");

if (btnAdd && modalAdd) {
    btnAdd.addEventListener("click", () => {
        modalAdd.style.display = "flex"; // abre el modal
    });
}

document.querySelectorAll(".modal-btn-edit").forEach(btn => {
    btn.addEventListener("click", () => {
        document.getElementById("modal-edit").style.display = "flex";
    });
});

document.querySelectorAll(".modal-btn-del").forEach(btn => {
    btn.addEventListener("click", () => {
        document.getElementById("modal-del").style.display = "flex";
    });
});

// cerrar con botón
document.querySelectorAll(".close-modal").forEach(btn => {
    btn.addEventListener("click", () => {
        btn.closest(".modal").style.display = "none";
    });
});

// cerrar haciendo click fuera
document.querySelectorAll(".modal").forEach(modal => {
    modal.addEventListener("click", e => {
        if (e.target === modal) modal.style.display = "none";
    });
});
