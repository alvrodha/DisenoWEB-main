document.addEventListener("DOMContentLoaded", () => {

    const modalAdd = document.getElementById("modal-add");
    const modalDel = document.getElementById("modal-del");

    const openModal = modal => modal && (modal.style.display = "flex");
    const closeModal = modal => modal && (modal.style.display = "none");

    /* =========================
       ABRIR MODAL AÑADIR
    ========================== */
    document.getElementById("modal-btn-add")?.addEventListener("click", e => {
        e.preventDefault();
        openModal(modalAdd);
    });

    /* =========================
       ELIMINAR (desde tabla)
    ========================== */
    document.querySelectorAll("form .modal-btn-del").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();

            const formFila = btn.closest("form");
            const usuario = formFila.querySelector("input[name='usuarioTabla']").value;

            // Insertar usuario en el modal
            let inputUsuario = modalDel.querySelector("input[name='usuario']");
            if (!inputUsuario) {
                inputUsuario = document.createElement("input");
                inputUsuario.type = "hidden";
                inputUsuario.name = "usuario";
                modalDel.querySelector("form").appendChild(inputUsuario);
            }
            inputUsuario.value = usuario;

            openModal(modalDel);
        });
    });

    /* =========================
       CERRAR MODALES
    ========================== */
    document.querySelectorAll(".close-modal").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            closeModal(btn.closest(".modal"));
        });
    });

    document.querySelectorAll(".modal").forEach(modal => {
        modal.addEventListener("click", e => {
            if (e.target === modal) closeModal(modal);
        });
    });
});
