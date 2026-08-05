import "./bootstrap";
import "flatpickr";
import "choices.js";
import * as FilePond from "filepond";
import "filepond/dist/filepond.css";

// Initialize Alpine.js plugins if needed
document.addEventListener("alpine:init", () => {
  // Global utilities
  Alpine.magic("uuid", () => {
    return () => "id-" + Math.random().toString(36).substr(2, 9);
  });
});

// Flatpickr initialization helper
window.initFlatpickr = (element, options = {}) => {
  const defaultOptions = {
    dateFormat: "Y-m-d",
    allowInput: true,
    locale: "id",
    ...options,
  };

  return flatpickr(element, defaultOptions);
};

// Choices.js initialization helper
window.initChoices = (element, options = {}) => {
  const defaultOptions = {
    removeItemButton: true,
    searchEnabled: true,
    shouldSort: false,
    placeholder: true,
    placeholderValue: "Pilih opsi...",
    ...options,
  };

  return new Choices(element, defaultOptions);
};

// FilePond initialization helper
window.initFilePond = (element, options = {}) => {
  const defaultOptions = {
    credits: false,
    allowMultiple: true,
    maxFiles: 5,
    maxFileSize: "5MB",
    labelIdle:
      'Drag & Drop file atau <span class="filepond--label-action">Browse</span>',
    labelFileProcessingComplete: "File berhasil diupload",
    labelFileProcessing: "Mengupload...",
    labelFileProcessingAborted: "Upload dibatalkan",
    labelFileProcessingError: "Error saat upload",
    labelTapToCancel: "Klik untuk membatalkan",
    labelTapToRetry: "Klik untuk mencoba ulang",
    labelTapToUndo: "Klik untuk membatalkan",
    ...options,
  };

  return FilePond.create(element, defaultOptions);
};

// TinyMCE initialization helper
window.initTinyMCE = (element, options = {}) => {
  const defaultOptions = {
    selector: element instanceof HTMLElement ? "#" + element.id : element,
    height: 300,
    menubar: false,
    plugins:
      "advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount",
    toolbar:
      "undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
    skin: "oxide",
    content_css: "default",
    language: "id",
    ...options,
  };

  // Load TinyMCE from CDN if not already loaded
  if (typeof tinymce === "undefined") {
    const script = document.createElement("script");
    script.src =
      "https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js";
    script.onload = () => {
      tinymce.init(defaultOptions);
    };
    document.head.appendChild(script);
  } else {
    tinymce.init(defaultOptions);
  }
};

// Auto-initialize plugins on page load
document.addEventListener("DOMContentLoaded", () => {
  // Auto-initialize flatpickr elements with data-flatpickr attribute
  document.querySelectorAll("[data-flatpickr]").forEach((element) => {
    const options = element.dataset.options
      ? JSON.parse(element.dataset.options)
      : {};
    window.initFlatpickr(element, options);
  });

  // Auto-initialize choices elements with data-choices attribute
  document.querySelectorAll("[data-choices]").forEach((element) => {
    const options = element.dataset.options
      ? JSON.parse(element.dataset.options)
      : {};
    window.initChoices(element, options);
  });

  // Auto-initialize filepond elements with data-filepond attribute
  document.querySelectorAll("[data-filepond]").forEach((element) => {
    const options = element.dataset.options
      ? JSON.parse(element.dataset.options)
      : {};
    window.initFilePond(element, options);
  });

  // Auto-initialize tinymce elements with data-tinymce attribute
  document.querySelectorAll("[data-tinymce]").forEach((element) => {
    const options = element.dataset.options
      ? JSON.parse(element.dataset.options)
      : {};
    window.initTinyMCE(element, options);
  });
});
