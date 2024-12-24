function showToast(message, type = "primary") {
  // Set the toast message
  const toastBody = document.getElementById("toast-body");
  toastBody.innerText = message;

  // Set the toast type
  const toastElement = document.getElementById("toast");
  toastElement.className = `toast align-items-center text-bg-${type} border-0`;

  // Initialize and show the toast
  const toast = new bootstrap.Toast(toastElement, {
    autohide: true,
    delay: 5000, // Set the delay dynamically
  });
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
