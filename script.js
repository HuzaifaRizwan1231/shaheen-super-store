function image1_click() {
  document.getElementById("main-image").src =
    document.getElementById("image-1").src;
}

function image2_click() {
  document.getElementById("main-image").src =
    document.getElementById("image-2").src;
}

function image3_click() {
  document.getElementById("main-image").src =
    document.getElementById("image-3").src;
}

function showToast(message, type = "primary") {
  // Set the toast message
  const toastBody = document.getElementById("toast-body");
  toastBody.innerText = message;

  // Set the toast type
  const toastElement = document.getElementById("toast");
  toastElement.className = `toast align-items-center text-bg-${type} border-0`;

  // Initialize and show the toast
  const toast = new bootstrap.Toast(toastElement);
  toast.show();
}

document.addEventListener("DOMContentLoaded", () => {
  const message = sessionStorage.getItem("toastMessage");
  const type = sessionStorage.getItem("toastType");

  if (message && type) {
    showToast(message, type); // Show the toast
    sessionStorage.removeItem("toastMessage"); // Clear the stored data
    sessionStorage.removeItem("toastType");
  }
});

function triggerToast(message, type = "primary", page) {
  sessionStorage.setItem(`toastMessage`, message);
  sessionStorage.setItem(`toastType`, type);
  if (!page) return;
  window.location.href = page;
}
