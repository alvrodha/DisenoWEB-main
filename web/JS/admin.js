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
    // const modalEdit = document.getElementById("modal-edit");
    const modalDel = document.getElementById("modal-del");

    const modalSuccess = document.getElementById("modal-success");
    const modalFail = document.getElementById("modal-fail");
    const inputDelUsuario = document.getElementById("del-usuario"); // input oculto
    
    // Botones abrir modals
    document.getElementById("modal-btn-add")?.addEventListener("click", () => {
        openModal(modalAdd);
    });

    // Cerrar modals (botón)
    document.querySelectorAll(".close-modal").forEach(btn => {
        btn.addEventListener("click", () => {
            closeModal(btn.closest(".modal"));
        });
    });

    // Editar
    /*
    document.querySelectorAll('.modal-btn-edit').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('edit-usuario').value = btn.dataset.usuario;
            document.getElementById('edit-nombre').value = btn.dataset.usuario;
            document.getElementById('edit-email').value = btn.dataset.email;
            document.getElementById('edit-passwd').value = btn.dataset.passwd;
        });
    });
    */

    

    if (!modalDel || !inputDelUsuario) {
        console.error("No se encontró el modal o el input oculto");
        return;
    }

    // Asignar valor al input oculto al hacer clic en cualquier botón eliminar
    document.querySelectorAll('.modal-btn-del').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            
            const usuario = btn.dataset.usuario;
            if (!usuario) {
                console.error("El botón no tiene data-usuario");
                return;
            }

            // Asignamos el valor al input oculto
            inputDelUsuario.value = usuario;               // para PHP
            inputDelUsuario.setAttribute('value', usuario); // opcional, para ver en DOM

            // Abrir el modal
            openModal(modalDel);
        });
    });

    // Cerrar modal con botón
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
