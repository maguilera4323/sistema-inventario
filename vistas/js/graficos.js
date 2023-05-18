(async () => {
    const respuestaRaw = await fetch("../API/comprasPorMes.php");
    const respuesta = await respuestaRaw.json();

    const $grafica = document.querySelector("#graficaComprasMes");
    const etiquetas = respuesta.mes;

    const datosCompras = {
        label: "Compras Registradas",
        data: respuesta.cantidades, 
        backgroundColor:['rgba(4, 144, 211, 0.64)'], 
        borderColor: 'rgba(54, 162, 235, 1)', 
        borderWidth: 1, // Ancho del borde
    };
    new Chart($grafica, {
        type: 'line', // Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [
                datosCompras,
                // Aquí más datos...
            ]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                      backdropPadding: {
                          x: 10,
                          y: 4
                      },
                        beginAtZero: true
                    }
                }],
            },
        }
    });
  })();
