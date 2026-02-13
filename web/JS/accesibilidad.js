function changeFontSize(action) {
    const html = document.documentElement;
    const currentSize = parseFloat(window.getComputedStyle(html).fontSize);

    if (action === 'increase' && currentSize < 24) {
        html.style.fontSize = (currentSize + 2) + 'px';
    } else if (action === 'decrease' && currentSize > 12) {
        html.style.fontSize = (currentSize - 2) + 'px';
    }
}