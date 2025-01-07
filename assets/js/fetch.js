document.addEventListener('DOMContentLoaded', function () {
    const responseDiv = document.getElementById("responseMessage");

    // Manejar el formulario "form_add_client" si está presente
    const formAddClient = document.getElementById("form_add_client");
    if (formAddClient) {
        formAddClient.addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            try {
                const response = await fetch("php/add.php", {
                    method: "POST",
                    body: formData,
                });
                const result = await response.json();

                if (responseDiv) {
                    if (result.status === "success") {
                        if (responseDiv.classList.contains("alert-danger")) responseDiv.classList.remove("alert-danger")
                        responseDiv.classList.replace("d-none", "d-block");
                        responseDiv.classList.add("alert-success");
                        responseDiv.textContent = result.message;
                        setTimeout(() => {
                            window.location.href = `index.php?page=home`;
                        }, 1500);
                    } else {
                        responseDiv.classList.replace("d-none", "d-block");
                        responseDiv.classList.add("alert-danger");
                        responseDiv.textContent = result.message;
                        setTimeout(() => {
                            responseDiv.classList.add("d-none");
                        }, 1500);
                    }
                }
            } catch (error) {
                if (responseDiv) {
                    responseDiv.textContent = "Error en la conexión. Intente nuevamente." + error;
                    responseDiv.classList.replace("d-none", "d-block");
                    responseDiv.classList.add("alert-danger");
                }
            }
        });
    }

    // Manejar el formulario "form_edit_client" si está presente
    const formEditClient = document.getElementById("form_edit_client");
    if (formEditClient) {
        formEditClient.addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            // return console.log(formData);
            try {
                const response = await fetch("php/edit.php", {
                    method: "POST",
                    body: formData,
                });
                const result = await response.json();

                if (responseDiv) {
                    if (result.status === "success") {
                        if (responseDiv.classList.contains("alert-danger")) responseDiv.classList.remove("alert-danger")
                        responseDiv.classList.replace("d-none", "d-block");
                        responseDiv.classList.add("alert-success");
                        responseDiv.textContent = result.message;
                        setTimeout(() => {
                            window.location.href = `index.php?page=home`;
                        }, 1500);
                    } else {
                        responseDiv.classList.replace("d-none", "d-block");
                        responseDiv.classList.add("alert-danger");
                        responseDiv.textContent = result.message;
                        setTimeout(() => {
                            responseDiv.classList.add("d-none");
                        }, 1500);
                    }
                }
            } catch (error) {
                if (responseDiv) {
                    responseDiv.textContent = "Error en la conexión. Intente nuevamente." + error;
                    responseDiv.classList.replace("d-none", "d-block");
                    responseDiv.classList.add("alert-danger");
                }
            }
        });
    }

    const btnDeleteClient = document.querySelectorAll(".btn-delete");
    if (btnDeleteClient) {
        btnDeleteClient.forEach(button => {
            button.addEventListener('click', async function (e) {
                e.preventDefault();  // Evita que se recargue la página al hacer clic

                const id = this.id;  // Obtiene el ID del elemento <a>



                try {
                    Swal.fire({
                        title: "¿Estás seguro/a?",
                        text: "No podrás revertir los cambios!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        cancelButtonText: "Cancelar",
                        confirmButtonText: "Sí, elimínalo!"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            const response = await fetch("php/delete.php?id=" + id);
                            const result = await response.json();

                            if (responseDiv) {
                                if (result.status === "success") {
                                    setTimeout(() => {
                                        window.location.href = `index.php?page=home`;
                                    }, 1000);
                                    if (responseDiv.classList.contains("alert-danger")) responseDiv.classList.remove("alert-danger")
                                    responseDiv.classList.replace("d-none", "d-block");
                                    responseDiv.classList.add("alert-success");
                                    responseDiv.textContent = result.message;
                                } else {
                                    responseDiv.classList.replace("d-none", "d-block");
                                    responseDiv.classList.add("alert-danger");
                                    responseDiv.textContent = result.message;
                                    setTimeout(() => {
                                        responseDiv.classList.add("d-none");
                                    }, 3000);
                                }
                            }
                            Swal.fire({
                                title: "Eliminado!",
                                text: "Tu registro ha sido eliminado.",
                                icon: "success"
                            });
                        }
                    });

                } catch (error) {
                    if (responseDiv) {
                        responseDiv.textContent = "Error en la conexión. Intente nuevamente." + error;
                        responseDiv.classList.replace("d-none", "d-block");
                        responseDiv.classList.add("alert-danger");
                    }
                }


            });
        });
    }

    const btnDisconnectClient = document.querySelectorAll(".btn-disconnect");
    if (btnDisconnectClient) {
        btnDisconnectClient.forEach(button => {
            button.addEventListener('click', async function (e) {
                e.preventDefault();  // Evita que se recargue la página al hacer clic

                const id = this.id;  // Obtiene el ID del elemento <a>

                try {
                    Swal.fire({
                        title: "¿Estás seguro/a de desconectar a este cliente del hostpot?",
                        // text: "No podrás revertir los cambios!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        cancelButtonText: "Cancelar",
                        confirmButtonText: "Sí, desconéctalo!"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            const response = await fetch("php/disconnect_client.php?id=" + id);
                            const result = await response.json();
                            // return console.log(result.data.mac)
                            if (responseDiv) {
                                if (result.status === "success") {
                                   
                                   
                                /*     fetch(`http://login-ae.internet.com/logout?username=T-${result.data.mac}`)
                                        .then(response => {
                                            if (response.ok) {
                                                console.log("Sesión cerrada exitosamente");
                                                if (responseDiv.classList.contains("alert-danger")) responseDiv.classList.remove("alert-danger")
                                                    responseDiv.classList.replace("d-none", "d-block");
                                                    responseDiv.classList.add("alert-success");
                                                    responseDiv.textContent = 'Sesión cerrada exitosamente';
                                            } else {
                                                console.error("Error al cerrar la sesión");
                                                responseDiv.classList.replace("d-none", "d-block");
                                                responseDiv.classList.add("alert-danger");
                                                responseDiv.textContent = 'Error al cerrar sesión';
                                                setTimeout(() => {
                                                    responseDiv.classList.add("d-none");
                                                }, 3000);
                                            }
                                        })
                                        .catch(error => {
                                            console.error("Error en la solicitud:", error);
                                        }); */
                                    window.open(`http://login-ae.internet.com/logout?username=T-${result.data.mac}`, '_blank');

                                } else {
                                    responseDiv.classList.replace("d-none", "d-block");
                                    responseDiv.classList.add("alert-danger");
                                    responseDiv.textContent = result.message;
                                    setTimeout(() => {
                                        responseDiv.classList.add("d-none");
                                    }, 3000);
                                }
                            }                          
                        }
                    });

                } catch (error) {
                    if (responseDiv) {
                        responseDiv.textContent = "Error en la conexión. Intente nuevamente." + error;
                        responseDiv.classList.replace("d-none", "d-block");
                        responseDiv.classList.add("alert-danger");
                    }
                }


            });
        });
    }
});


