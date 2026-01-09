document.addEventListener("DOMContentLoaded", () => {

    // Abrir y cerrar los modales
    const openModal = (modal) => {
        if (modal) modal.style.display = "flex";
    };
    const closeModal = (modal) => {
        if (modal) modal.style.display = "none";
    };

    // Modals principales
    const modalAdd = document.getElementById("modal-add");
    const modalEdit = document.getElementById("modal-edit");
    const modalDel = document.getElementById("modal-del");

    const modalSuccess = document.getElementById("modal-success");
    const modalFail = document.getElementById("modal-fail");

    // Botones abrir modals
    document.getElementById("modal-btn-add")?.addEventListener("click", () => {
        openModal(modalAdd);
    });
    document.querySelectorAll(".modal-btn-edit").forEach(btn => {
        btn.addEventListener("click", () => openModal(modalEdit));
    });
    document.querySelectorAll(".modal-btn-del").forEach(btn => {
        btn.addEventListener("click", () => openModal(modalDel));
    });

    // Cerrar modals (botón)
    document.querySelectorAll(".close-modal").forEach(btn => {
        btn.addEventListener("click", () => {
            closeModal(btn.closest(".modal"));
        });
    });

    // Cerrar modals (click fuera)
    document.querySelectorAll(".modal").forEach(modal => {
        modal.addEventListener("click", e => {
            if (e.target === modal) closeModal(modal);
        });
    });

    // RESULTADO DE TRANSACCIÓN (PHP)
    if (typeof transactionStatus !== "undefined" && transactionStatus !== null) {

        // Cerrar cualquier modal abierto
        [modalAdd, modalEdit, modalDel].forEach(closeModal);

        if (transactionStatus === "success") {
            openModal(modalSuccess);
        }

        if (transactionStatus === "fail") {
            openModal(modalFail);
        }
    }
});
