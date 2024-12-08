// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", () => {
    // Get all textareas and attach a character counter
    const textareas = document.querySelectorAll("textarea");
    textareas.forEach((textarea) => {
        const maxChars = 500; // Maximum allowed characters
        const charCounter = document.createElement("div");
        charCounter.style.fontSize = "12px";
        charCounter.style.marginTop = "5px";
        charCounter.style.color = "#888";
        charCounter.textContent = `0/${maxChars} characters used`;

        textarea.parentNode.appendChild(charCounter);

        textarea.addEventListener("input", () => {
            const currentLength = textarea.value.length;
            charCounter.textContent = `${currentLength}/${maxChars} characters used`;
            if (currentLength > maxChars) {
                charCounter.style.color = "red";
            } else {
                charCounter.style.color = "#888";
            }
        });
    });

    // Real-time validation for required fields
    const requiredFields = document.querySelectorAll("input[required], select[required], textarea[required]");
    const form = document.querySelector("form");

    form.addEventListener("submit", (e) => {
        let valid = true;

        requiredFields.forEach((field) => {
            if (!field.value.trim()) {
                valid = false;
                field.style.border = "2px solid red";
            } else {
                field.style.border = "1px solid #ccc";
            }
        });

        if (!valid) {
            e.preventDefault();
            alert("Please fill out all required fields.");
        }
    });

    // Autofill example for testing (optional)
    const autofillButton = document.createElement("button");
    autofillButton.textContent = "Autofill";
    autofillButton.style.marginTop = "10px";
    autofillButton.style.backgroundColor = "#4CAF50";
    autofillButton.style.color = "#fff";
    autofillButton.style.padding = "10px";
    autofillButton.style.border = "none";
    autofillButton.style.borderRadius = "4px";
    autofillButton.style.cursor = "pointer";
    autofillButton.style.fontSize = "14px";
    form.appendChild(autofillButton);

    autofillButton.addEventListener("click", (e) => {
        e.preventDefault();
        document.getElementById("name").value = "John Doe";
        document.getElementById("age").value = "30";
        document.getElementById("gender").value = "Male";
        document.getElementById("contact").value = "9876543210";
        document.getElementById("emergency_contact").value = "9876543211";
        document.getElementById("height").value = "170";
        document.getElementById("weight").value = "70";
        document.getElementById("blood_group").value = "O+";
        document.getElementById("allergies").value = "None";
        document.getElementById("medical_history").value = "Diabetes";
        document.getElementById("surgical_history").value = "Appendectomy";
        document.getElementById("medications").value = "Metformin";
        document.getElementById("smoking_status").value = "Non-Smoker";
        document.getElementById("alcohol_consumption").value = "Occasional";
        document.getElementById("procedure").value = "Knee Surgery";
        document.getElementById("symptoms").value = "Pain in the right knee";
        document.getElementById("fasting_duration").value = "8";
    });
});
