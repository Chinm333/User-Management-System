const ctx1 = document.getElementById('barChart').getContext('2d');
const departmentLabels = Object.keys(totalEmployeesPerDept);
const departmentData = Object.values(totalEmployeesPerDept);
const chartData1 = {
    labels: departmentLabels,
    datasets: [{
      label: 'Total Employees',
      data: departmentData,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgba(255, 99, 132, 1)',
    }]
  };

const config1 = {
  type: 'bar',
  data: chartData1,
  options: {
    indexAxis: 'y',
    elements: {
      bar: {
        borderWidth: 2,
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'right',
      },
      title: {
        display: true,
        text: 'Total Employees per Department'
      }
    }
  },
};

const myChart1 = new Chart(ctx1, config1);
