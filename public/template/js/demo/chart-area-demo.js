const ctx = document.getElementById('arsipChart').getContext('2d');
let arsipChart;

function loadChart(year, month = '') {
    let url = `/chart-data?year=${year}`;
    if (month) url += `&month=${month}`;

    fetch(url)
        .then(res => res.json())
        .then(data => {
            const labels = Object.keys(data);
            const values = Object.values(data);

            if (arsipChart) arsipChart.destroy();

            arsipChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Arsip',
                        data: values,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                                callback: function(value) {
                                    if (Number.isInteger(value)) {
                                        return value;
                                    }
                                }
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: 12
                            }
                        }]
                    }
                }
            });
        });
}

// Load default (tahun sekarang)
loadChart(new Date().getFullYear());

// Event filter
document.getElementById('yearFilter').addEventListener('change', function() {
    loadChart(this.value, document.getElementById('monthFilter').value);
});
document.getElementById('monthFilter').addEventListener('change', function() {
    loadChart(document.getElementById('yearFilter').value, this.value);
});