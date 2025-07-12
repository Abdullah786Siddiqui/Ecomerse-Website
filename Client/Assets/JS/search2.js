// Debounce helper to limit calls
let searchTimeout2;

function searchFunc2(query) {
  const resultCard = document.getElementById("resultCard2");
  const output = document.getElementById("output2");

  // If empty query, reset UI
  if (query.trim() === "") {
    clearTimeout(searchTimeout22);
    resultCard.classList.add("d-none");
    output.innerHTML = `<div class="text-muted">Start typing to search</div>`;
    return;
  }

  // Show "searching" message
  resultCard.classList.remove("d-none");
  output.innerHTML = `  <div class="d-flex justify-content-center my-2">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading…</span>
      </div>
    </div>`;

  // Debounce fetch to avoid too many requests
  clearTimeout(searchTimeout2);
  searchTimeout2 = setTimeout(() => {
    fetch("../Server/Process/search-process.php?query=" + encodeURIComponent(query))
      .then(res => {
        return res.text();
      })
      .then(data => {
        if (data.trim()) {
          output.innerHTML = data;
        } else {
          output.innerHTML = `<div class="text-warning">No results found</div>`;
        }
      })
      .catch(err => {
        output.innerHTML = `<div class="text-danger">Error: ${err.message}</div>`;
      });
  }, 300); // debounce: adjust ms as needed
}
