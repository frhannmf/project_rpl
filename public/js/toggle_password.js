const checkbox_password = document.getElementById("toggle-password");
const input_password = document.querySelectorAll(".password-input");

checkbox_password.addEventListener("click", () => {
    for (const input of input_password) {
        if (checkbox_password.checked) {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
});
