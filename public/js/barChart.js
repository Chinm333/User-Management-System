let chartType = "bar";
let myChart = null;

function toggleChart() {
  const chartContainer = document.getElementById("chartContainer");
  if (chartContainer) {
    chartContainer.classList.toggle("hidden");
  }

  chartType = chartType === "bar" ? "line" : "bar";
  updateChart();
}

function updateChart() {
    const ctx = document.getElementById('chartCanvas').getContext('2d');
    const departmentLabels = Object.keys(avgSalaryPerDept);
    const departmentData = Object.values(avgSalaryPerDept);
    const chartData = {
      labels: departmentLabels,
      datasets: [{
        label: 'Average Salary per Department',
        data: departmentData,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
      }]
    };

  const config = {
    type: chartType,
    data: chartData,
    options: {
    }
  };

  // Destroy existing chart if it exists
  if (myChart) {
    myChart.destroy();
  }

  // Create or update chart
  myChart = new Chart(ctx, config);
}

export { toggleChart,updateChart };
