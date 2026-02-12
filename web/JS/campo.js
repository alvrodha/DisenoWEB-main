const canvas = document.getElementById('campoFutbol');
const ctx = canvas.getContext('2d');

function dibujarCampo() {
    // Césped
    ctx.fillStyle = '#458B00';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Líneas
    ctx.strokeStyle = 'white';
    ctx.lineWidth = 2;

    // Bordes campo
    ctx.strokeRect(10, 10, canvas.width - 20, canvas.height - 20);

    // Línea central
    ctx.beginPath();
    ctx.moveTo(10, canvas.height / 2);
    ctx.lineTo(canvas.width - 10, canvas.height / 2);
    ctx.stroke();

    // Círculo central
    ctx.beginPath();
    ctx.arc(canvas.width / 2, canvas.height / 2, 35, 0, Math.PI * 2);
    ctx.stroke();

    // Áreas
    ctx.strokeRect(canvas.width / 2 - 50, 10, 100, 40); // Arriba
    ctx.strokeRect(canvas.width / 2 - 50, canvas.height - 50, 100, 40); // Abajo

    // JUGADORES (Táctica 1-2-1)
    const colorJugador = '#1c1d3d';
    const colorBorde = '#ffd700';

    const tactica = [
        { x: 150, y: 415, n: '1' },  // Portero
        { x: 150, y: 330, n: '4' },  // Cierre
        { x: 70,  y: 225, n: '7' },  // Ala Izq
        { x: 230, y: 225, n: '11' }, // Ala Der
        { x: 150, y: 100, n: '10' }  // Pívot
    ];

    tactica.forEach(j => {
        // Círculo jugador
        ctx.fillStyle = colorJugador;
        ctx.beginPath();
        ctx.arc(j.x, j.y, 12, 0, Math.PI * 2);
        ctx.fill();
        ctx.strokeStyle = colorBorde;
        ctx.stroke();

        // Número
        ctx.fillStyle = 'white';
        ctx.font = 'bold 12px Arial';
        ctx.textAlign = 'center';
        ctx.fillText(j.n, j.x, j.y + 4);
    });
}

dibujarCampo();