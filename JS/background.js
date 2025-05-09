const canvas = document.getElementById('codedrop');
const ctx = canvas.getContext('2d');

let width = window.innerWidth;
let height = window.innerHeight;
canvas.width = width;
canvas.height = height;

// Funkcja sprawdzająca, czy to urządzenie mobilne
function isMobile() {
  return /Mobi|Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

const codeLines = [
  'if (x > 0) {',
  'while (true) {',
  'for (let i = 0; i < 10; i++) {',
  'return x * y;',
  'function myFunc() {',
  'scanf("%d", num);',
  'int main() {',
  'print("Hello, World!")',
  '#include <iostream>',
  '<!DOCTYPE html>',
  '#include <stdio.h>',
  'import random',
  'class Programmer {',
  'body {background-color: black;}',
  'g++ main.cpp -o program',
  'sudo rm -rf /*',
  'sudo apt install',
  'index.html',
  'styles.css',
  'script.js',
  'main.c',
  'main.cpp',
  'main.py',
  'document.getElementById("tymianekk")',
];

// Konfiguracja zależna od urządzenia
const isOnMobile = isMobile();
const dropCount = isOnMobile ? 40 : 100;
const fontSize = isOnMobile ? 12 : 16;

const drops = [];

for (let i = 0; i < dropCount; i++) {
  drops.push({
    text: codeLines[Math.floor(Math.random() * codeLines.length)],
    x: Math.random() * width,
    y: Math.random() * height,
    speed: 0.3 + Math.random() * 0.7 
  });
}

function draw() {
  ctx.fillStyle = 'black'; 
  ctx.fillRect(0, 0, width, height);
  ctx.fillStyle = '#665e5e'; 
  ctx.font = `${fontSize}px monospace`;

  drops.forEach(drop => {
    ctx.fillText(drop.text, drop.x, drop.y);
    drop.y += drop.speed;
    if (drop.y > height) {
      drop.y = -20;
      drop.text = codeLines[Math.floor(Math.random() * codeLines.length)];
      drop.x = Math.random() * width;
    }
  });

  requestAnimationFrame(draw);
}
draw();

window.addEventListener('resize', () => {
  width = window.innerWidth;
  height = window.innerHeight;
  canvas.width = width;
  canvas.height = height;
});