// Se asegura de que la animación del formulario no se pierda
window.onload = function () {
    const formContainer = document.querySelector('.form-container');
    formContainer.style.animation = "fadeIn 1s ease-out forwards";
};

function openModal() {
    document.getElementById('termsModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('termsModal').style.display = 'none';
}

document.getElementById('registrationForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    // return alert('hola arnaldo');
    const formData = new FormData(this);
    const macAddress = document.getElementById('mac').value; // Obtener la MAC del campo oculto
    const responseDiv = document.getElementById("responseMessage");

    try { 
        const response = await fetch("php/connect_client.php", {
            method: "POST",
            body: formData,
        });
        const result = await response.json();
        // console.log(result.message)
        if (result.status === "success") {
            if (responseDiv.classList.contains("alert-danger")) responseDiv.classList.remove("alert-danger")
            responseDiv.classList.replace("d-none", "d-block");
            responseDiv.classList.add("alert-success");
            responseDiv.textContent = result.message;
            // setTimeout(() => {
            //     window.location.href = `http://login-ae.internet.com/login?username=T-${macAddress}`; // Redirigir con la MAC
            // }, 1500);
        } else {
            responseDiv.classList.replace("d-none", "d-block");
            responseDiv.classList.add("alert-danger");
            responseDiv.textContent = result.message;
            setTimeout(() => {
                responseDiv.classList.add("d-none");
            }, 1500);
        }
    } catch (error) {
        responseDiv.textContent = "Error en la conexión. Intente nuevamente :" + error;
        responseDiv.classList.replace("d-none", "d-block");
        responseDiv.classList.add("alert-danger");
    }
});