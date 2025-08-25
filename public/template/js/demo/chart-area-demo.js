fetch('/chart-data')
    .then(res => res.json())
    .then(data => {
        console.log(data);
        const ctx = document.getElementById('arsipChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Jumlah Arsip',
                    data: Object.values(data),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false, // biar mengikuti tinggi div parent
              scales: {
                  y: {
                      beginAtZero: true,
                      ticks: {
                          callback: function(value) {
                              if (Number.isInteger(value)) return value;
                          },
                          stepSize: 1
                      }
                  }
              }
          }
        });
    })
    .catch(err => console.error("Fetch error:", err));
