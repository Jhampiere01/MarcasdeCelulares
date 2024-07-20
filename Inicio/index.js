window.addEventListener('load', () => {
    const loader = document.getElementById('page');
    const content = document.querySelector('.container');
    setTimeout(() => {
        loader.style.display = 'none';
        content.style.display = 'flex';
    }, 5000);
});