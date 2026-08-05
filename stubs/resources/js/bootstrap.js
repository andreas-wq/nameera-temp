import axios from "axios";
import _ from "lodash";

window.axios = axios;
window._ = _;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// CSRF Token handling
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
  window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
  console.error("CSRF token not found");
}

// Error handling
window.axios.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response?.status === 419) {
      // Session expired
      alert("Session expired. Please refresh the page.");
      window.location.reload();
    }
    return Promise.reject(error);
  },
);

// Alpine.js persist plugin
document.addEventListener("alpine:init", () => {
  Alpine.persist = (key, { get, set }) => ({
    init() {
      const stored = localStorage.getItem(key);
      if (stored !== null) {
        set(JSON.parse(stored));
      }

      this.$watch("$data", (value) => {
        localStorage.setItem(key, JSON.stringify(value));
      });
    },
  });
});
