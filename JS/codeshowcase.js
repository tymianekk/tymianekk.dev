const texts = [
  "//C\n\n#include <stdio.h>\n\nint main() {\n\tprintf(\"Hello, World!\");\n\treturn 0;\n}",
  "//Python\n\nprint(\"Hello, World!\")",
  "//C++\n\n#include <iostream>\n\nint main() {\n\tcout << \"Hello, World!\";\n\treturn 0;\n}",
  "//JavaScript\n\nconsole.log(\"Hello, World!\");",
];

const typingSpeed = 100;
const pauseTime = 1500; 
const deletingSpeed = 50;

let textIndex = 0;
let charIndex = 0;
let isDeleting = false;
const el = document.getElementById('typewriter');

function type() {
  const currentText = texts[textIndex];
    
  if (isDeleting) {
    charIndex--;
  } else {
    charIndex++;
  }

  const safeText = escapeHtml(currentText.substring(0, charIndex)).replace(/\n/g, "<br>");
  el.innerHTML = safeText;
  


  if (!isDeleting && charIndex === currentText.length) {
    setTimeout(() => {
      isDeleting = true;
      type();
    }, pauseTime);
  } else if (isDeleting && charIndex === 0) {
    isDeleting = false;
    textIndex = (textIndex + 1) % texts.length;
    setTimeout(type, typingSpeed);
  } else {
    setTimeout(type, isDeleting ? deletingSpeed : typingSpeed);
  }
}

function escapeHtml(text) {
    return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;")
      .replace(/\t/g, "&nbsp;&nbsp;&nbsp;&nbsp;");
  }
  

type();