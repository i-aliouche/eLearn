// Live search feature that fetches and displays post suggestions as the user types
let searchInput = document.querySelector(".form-input input");
let suggestionBox = document.querySelector(".suggestion-box");
let loader = document.querySelector(".loader");
let typingTime;

searchInput.addEventListener("input", () => {
  clearTimeout(typingTime); // Clear the previous timeout
  suggestionBox.textContent = ""; // Clear the suggestion box text content
  if (searchInput.value) {
    suggestionBox.classList.add("active");
    loader.classList.add("active");
    // Debounce the fetch request by setting a timeout
    typingTime = setTimeout(() => {
      fetch(
        "http://localhost/wp/wp-json/wp/v2/posts?search=" +
          encodeURIComponent(searchInput.value)
      )
        .then((response) => response.json())
        .then((posts) => {
          if (posts.length > 0) {
            // Update the suggestion box with the post title
            suggestionBox.innerHTML = `
            <h5>Featured Posts</h5>
            <ul class="ps-0">
              ${posts
                .slice(0, 2)
                .map(
                  (el) =>
                    `<li class="list-unstyled"><a class="text-decoration-none text-dark" href="${el.link}">${el.title.rendered}</a></li>`
                )
                .join("")}
            </ul>
            `;
          } else {
            suggestionBox.textContent = "No posts found";
          }
        })
        .finally(() => {
          loader.classList.remove("active"); // Hide loader when fetch is complete or fails
        });
    }, 500);
  } else {
    suggestionBox.classList.remove("active");
    loader.classList.remove("active");
  }
});

// Fix the active class problem in nav bar
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
