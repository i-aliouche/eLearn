document.addEventListener("DOMContentLoaded", (event) => {
  // Remove 'active' class from all nav links
  document.querySelectorAll(".nav-link").forEach((link) => {
    link.classList.remove("active");
  });

  // Add 'active' class to the nav link that matches the current page URL or is part of it
  document.querySelectorAll(".nav-link").forEach((link) => {
    // Check if the link's href is in the current URL
    if (window.location.href.includes(link.getAttribute("href"))) {
      link.classList.add("active");
    }
  });
});
