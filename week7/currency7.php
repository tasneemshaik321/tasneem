<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Currency Converter</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="7.2.css">
  <style>
    /* General Styles */
body {
    background-color: #f8f9fa;
    color: #333;
    transition: background-color 0.3s, color 0.3s;
  }
  
  h1 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #0d6efd;
  }
  
  .card {
    border: none;
    border-radius: 10px;
    transition: transform 0.3s, box-shadow 0.3s;
  }
  
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }
  
  .card-header {
    font-size: 1.25rem;
    font-weight: bold;
  }
  
  .table-hover tbody tr:hover {
    background-color: #f1f1f1;
  }
  
  /* Dark Mode Styles */
  body.dark-mode {
    background-color: #121212;
    color: #ffffff;
  }
  
  .dark-mode .card {
    background-color: #1e1e1e;
    color: #ffffff;
  }
  
  .dark-mode .card-header {
    background-color: #333;
    color: #ffffff;
  }
  
  .dark-mode .table {
    background-color: #1e1e1e;
    color: #ffffff;
  }
  
  .dark-mode .table th,
  .dark-mode .table td {
    border-color: #444;
  }
  
  .dark-mode .table-hover tbody tr:hover {
    background-color: #333;
  }
  
  .dark-mode .btn-secondary {
    background-color: #444;
    border-color: #444;
  }
  
  /* Animations */
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  
  .fade-in {
    animation: fadeIn 0.5s ease-in;
  }
  </style>
</head>
<body>
  <div class="container mt-5">
    <!-- Dark Mode Toggle Button -->
    <div class="text-end mb-3">
      <button id="darkModeToggle" class="btn btn-secondary">
        <i class="fas fa-moon"></i> Dark Mode
      </button>
    </div>

    <h1 class="text-center mb-4">💱 Currency Converter</h1>

    <!-- Currency Converter -->
    <div class="card mt-4 shadow-sm">
      <div class="card-header bg-primary text-white">
        <i class="fas fa-exchange-alt"></i> Currency Converter
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-3">
            <input type="number" id="amount" class="form-control" placeholder="Amount" value="1" min="1">
          </div>
          <div class="col-md-3">
            <select id="baseCurrency" class="form-control"></select>
          </div>
          <div class="col-md-3">
            <select id="targetCurrency" class="form-control"></select>
          </div>
          <div class="col-md-3">
            <button id="convertBtn" class="btn btn-success w-100">
              <i class="fas fa-calculator"></i> Convert
            </button>
          </div>
        </div>
        <div class="mt-3 text-center">
          <h4 id="conversionResult" class="text-success fw-bold"></h4>
        </div>
      </div>
    </div>

    <!-- Historical Exchange Rates -->
    <div class="card mt-4 shadow-sm">
      <div class="card-header bg-info text-white">
        <i class="fas fa-history"></i> Historical Exchange Rates
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-3">
            <input type="date" id="startDate" class="form-control">
          </div>
          <div class="col-md-3">
            <input type="date" id="endDate" class="form-control">
          </div>
          <div class="col-md-3">
            <button id="fetchHistoryBtn" class="btn btn-info w-100">
              <i class="fas fa-search"></i> Fetch History
            </button>
          </div>
        </div>
        <div class="mt-3">
          <table id="historyTable" class="table table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th>Date</th>
                <th>Rate</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Bar Chart Visualization -->
    <div class="card mt-4 shadow-sm">
      <div class="card-header bg-warning text-dark">
        <i class="fas fa-chart-bar"></i> Exchange Rate Trends
      </div>
      <div class="card-body">
        <canvas id="exchangeRateChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="7.2.js"></script>
  <script>
    // Fetch currencies and populate dropdowns
async function fetchCurrencies() {
    const response = await fetch('https://api.frankfurter.app/currencies');
    const data = await response.json();
    const baseCurrency = document.getElementById('baseCurrency');
    const targetCurrency = document.getElementById('targetCurrency');
  
    for (const currency in data) {
      const option1 = document.createElement('option');
      option1.value = currency;
      option1.textContent = ${currency} - ${data[currency]};
      baseCurrency.appendChild(option1);
  
      const option2 = document.createElement('option');
      option2.value = currency;
      option2.textContent = ${currency} - ${data[currency]};
      targetCurrency.appendChild(option2);
    }
  }
  
  // Currency Conversion
  document.getElementById('convertBtn').addEventListener('click', async () => {
    const amount = document.getElementById('amount').value;
    const base = document.getElementById('baseCurrency').value;
    const target = document.getElementById('targetCurrency').value;
  
    if (!amount || amount <= 0) {
      alert("Please enter a valid amount!");
      return;
    }
  
    const response = await fetch(https://api.frankfurter.app/latest?amount=${amount}&from=${base}&to=${target});
    const data = await response.json();
    const result = ${amount} ${base} = ${data.rates[target]} ${target};
    document.getElementById('conversionResult').textContent = result;
    document.getElementById('conversionResult').classList.add('fade-in');
  });
  
  // Fetch Historical Exchange Rates
  document.getElementById('fetchHistoryBtn').addEventListener('click', async () => {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const base = document.getElementById('baseCurrency').value;
    const target = document.getElementById('targetCurrency').value;
  
    if (!startDate || !endDate) {
      alert("Please select both start and end dates!");
      return;
    }
  
    const response = await fetch(https://api.frankfurter.app/${startDate}..${endDate}?from=${base}&to=${target});
    const data = await response.json();
    const tableBody = document.querySelector('#historyTable tbody');
    tableBody.innerHTML = '';
  
    for (const date in data.rates) {
      const row = document.createElement('tr');
      row.innerHTML = <td>${date}</td><td>${data.rates[date][target]}</td>;
      tableBody.appendChild(row);
    }
  
    // Render Chart
    renderChart(data);
  });
  
  // Render Chart
  function renderChart(data) {
    const ctx = document.getElementById('exchangeRateChart').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: Object.keys(data.rates),
        datasets: [{
          label: 'Exchange Rate',
          data: Object.values(data.rates).map(rate => rate[Object.keys(rate)[0]]),
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }
  
  // Dark Mode Toggle
  document.getElementById('darkModeToggle').addEventListener('click', () => {
    const body = document.body;
    body.classList.toggle('dark-mode');
  
    // Update button text
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (body.classList.contains('dark-mode')) {
      darkModeToggle.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
    } else {
      darkModeToggle.innerHTML = '<i class="fas fa-moon"></i> Dark Mode';
    }
  
    // Save preference to localStorage
    const isDarkMode = body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', isDarkMode);
  });
  
  // Check for saved dark mode preference
  function checkDarkModePreference() {
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    if (isDarkMode) {
      document.body.classList.add('dark-mode');
      document.getElementById('darkModeToggle').innerHTML = '<i class="fas fa-sun"></i> Light Mode';
    }
  }
  
  // Initialize
  fetchCurrencies();
  checkDarkModePreference();
  </script>
</body>
</html>