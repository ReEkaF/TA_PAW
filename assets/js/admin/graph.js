const ctx = document.getElementById("graph");

const labels = [
  "JAN",
  "FEB",
  "MAR",
  "APR",
  "MAY",
  "JUN",
  "JUL",
  "AUG",
  "SEP",
  "OCT",
  "NOV",
  "DEC",
];

const data = {
  labels: labels,
  datasets: [
    {
      label: "Users",
      data: [
        2000, 2500, 1500, 1800, 2200, 2600, 2400, 2800, 3200, 3800, 4100, 4600,
      ],
      borderColor: "#204e51",
      borderWidth: 6,
      tension: 0.4,
      pointStyle: false,
    },
  ],
};

new Chart(ctx, {
  type: "line",
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      },
      tooltip: {
        usePointStyle: true,
      },
    },
    scales: {
      x: {
        ticks: {
          padding: 16,
          color: "#8d8d91",
          font: {
            family: '"Nunito", sans-serif',
            size: 12,
          },
        },
        grid: {
          color: "#e9e9e9",
        },
      },
      y: {
        beginAtZero: true,
        ticks: {
          padding: 16,
          color: "#8d8d91",
          font: {
            family: '"Nunito", sans-serif',
            size: 12,
          },
          callback: function (value, index, values) {
            return Number((value / 1000).toString()) + "K";
          },
        },
        border: {
          display: false,
        },
        grid: {
          display: false,
        },
      },
    },
  },
});
