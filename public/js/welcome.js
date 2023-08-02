window.addEventListener('DOMContentLoaded', () => {
    const fireworks = document.querySelectorAll('.firework');

    fireworks.forEach((firework, index) => {
        setTimeout(() => {
            firework.style.left = `${Math.random() * 100}%`;
            firework.style.bottom = `${Math.random() * 100}%`;
            firework.style.animationDuration = `${Math.random() * 2 + 1}s`;
            firework.style.animationDelay = `${Math.random()}s`;
            firework.style.opacity = 1;
        }, index * 500);
    });
});