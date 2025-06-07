// Password toggle
function togglePassword() {
    const passInput = document.getElementById("password");
    const toggleText = document.querySelector(".toggle-password");
    if (passInput.type === "password") {
        passInput.type = "text";
        toggleText.textContent = "🙈";
    } else {
        passInput.type = "password";
        toggleText.textContent = "👁";
    }
}

// Dark mode toggle
document.getElementById("themeToggle").addEventListener("click", function () {
    document.body.classList.toggle("dark");
    this.textContent = document.body.classList.contains("dark") ? "☀️" : "🌙";
});

// switch tab functionality
const loginTab = document.querySelector(".login-container");
const signupTab = document.querySelector(".signup-container");
loginTab.classList.add("active");

function switchTabSignUp() {
    loginTab.classList.remove("active");
    signupTab.classList.add("active");
}

function switchTabLogin() {
    signupTab.classList.remove("active");
    loginTab.classList.add("active");
}

document.querySelector(".switch-to-signUp").addEventListener("click", switchTabSignUp);
document.querySelector(".switch-to-login").addEventListener("click", switchTabLogin);

// Load session data and errors from PHP
window.addEventListener("DOMContentLoaded", () => {
    fetch("get_session.php")
        .then((res) => res.json())
        .then((data) => {
            if (data.errors) {
                for (const [field, msg] of Object.entries(data.errors)) {
                    const errorDiv = document.getElementById(field);
                    if (errorDiv) {
                        errorDiv.textContent = msg;
                        errorDiv.style.color = "red";
                    }
                }
            }

            if (data.old) {
                document.getElementById("name").value = data.old.name || "";
                document.getElementById("create-userid").value = data.old.userid || "";
                document.getElementById("gmail").value = data.old.email || "";
                document.getElementById("create-password").value = data.old.password || "";
                document.getElementById("confirmPassword").value = data.old.confirmPassword || "";
            }

            if (data.success) {
                alert(data.success); // 🎉 Signup success
            }

            // Switch to correct tab
            if (data.tab === "signup") {
                switchTabSignUp();
            } else {
                switchTabLogin(); // default to login if not specified
            }
        });
});
