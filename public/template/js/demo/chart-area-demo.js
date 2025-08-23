fetch("/chart-data")
  .then(response => response.json())
  .then(data => {
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Tata Usaha", "Yandas", "Non-Pelayanan Dasar", "Bina Mental Spiritual"],
        datasets: [{
          label: "Total Arsip",
          data: [data.TU, data.Yandas, data.NPD, data.BMS],
          borderColor: "rgba(78, 115, 223, 1)",
          backgroundColor: "rgba(78, 115, 223, 0.05)"
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,  // biar bisa atur tinggi sendiri
        aspectRatio: 2,              // lebar:tinggi (misal 2 = lebar 2x tinggi)
        scales: {
          yAxes: [{
            ticks: { beginAtZero: true, stepSize: 1 }
          }]
        }
      }
    });
  });
