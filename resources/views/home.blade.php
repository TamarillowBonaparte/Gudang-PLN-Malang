<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PLN ARM MALANG</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/assets/img/logo pln.png') }}" rel="icon">
    <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Memuat jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Memuat DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Memuat DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .filter-label span {
            transition: text-decoration 0.3s;
        }

        .filter-label span.line-through {
            text-decoration: line-through;
        }
    </style>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    {{-- Style Buat Calender --}}
    <style>
        /* Tambahkan Flexbox untuk menata kalender */
        .calendar-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 20px;
        }

        .calendar {
            flex: 1;
            min-width: 300px;
            /* Pastikan kalender tidak terlalu kecil */
            max-width: 500px;
        }

        .calendar-day {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .calendar-day:hover {
            background-color: #e9ecef;
        }

        .calendar-day.selected {
            background-color: #0d6efd;
            color: white;
        }

        .calendar-day.today {
            background-color: #ffc107;
            color: black;
        }

        .calendar-day.text-muted {
            cursor: default;
        }

        .calendar-day.text-muted:hover {
            background-color: transparent;
        }

        /* Tambahkan styling untuk elemen lainnya jika ada di samping */
        .other-content {
            flex: 1;
            min-width: 300px;
            /* Jika ada konten lain, beri ruang */
        }
    </style>
    {{-- End Style Buat Calender --}}

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- ======= Header =======-->
    @include('header')

    <!-- ======= Sidebar ======= -->
    @include('sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <a href="{{ url('daftar-permintaan-material') }}"
                                class="card info-card sales-card text-decoration-none">
                                <div class="card-body">
                                    <h5 class="card-title">DAFTAR PERMINTAAN MATERIAL/DPB</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-archive-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $dpbjumlah }}</h6>
                                            <span>Jumlah</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Sales Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">BON PEMAKAIAN MATERIAL (K7)</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box-seam-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $k7jumlah }}</h6>
                                            <span>Jumlah</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Customers Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">BON PENGEMBALIAN MATERIAL (K3)</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-dropbox"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $k3jumlah }}</h6>
                                            <span>Jumlah</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Revenue Card -->

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">Status Surat Jalan</h5>
                                    <table class="table table-borderless" id="suratJalanTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No DPB</th>
                                                <th scope="col">Tanggal Diminta</th>
                                                <th scope="col">Vendor</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($suratJln as $sj)
                                                <tr>
                                                    <th scope="row"
                                                        style="{{ $sj->ndpb == null ? 'text-align: center' : '' }}">
                                                        {{ $sj->ndpb != null ? $sj->ndpb : '-' }}</th>
                                                    <td style="{{ $sj->tgl == null ? 'text-align: center' : '' }}">
                                                        {{ $sj->tgl != null ? \Carbon\Carbon::parse($sj->tgl)->format('d M Y') : '-' }}
                                                    </td>
                                                    <td>{{ $sj->nmuser }}</td>
                                                    <td>
                                                        <span
                                                            class="{{ $sj->nsurat != null ? 'badge bg-success' : 'badge bg-warning' }}">
                                                            {{ $sj->nsurat != null ? 'Sudah dicetak' : 'Belum dicetak' }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Recent Sales -->

                        <!-- Grafik Stok Barang -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Grafik Stok Barang Tersedia</h5>
                                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                                    <div id="chartLegend" style="text-align: center; margin-top: 15px;"></div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            const materialData = @json($materialStok);

                                            const activeMaterials = materialData.map(item => ({
                                                nama: item.nama,
                                                total_stok: item.total_stok,
                                                hidden: false
                                            }));

                                            const ctx = document.querySelector('#barChart');
                                            const barChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: activeMaterials.map(item => item.nama),
                                                    datasets: [{
                                                        label: 'Jumlah Stok',
                                                        data: activeMaterials.map(item => item.total_stok),
                                                        backgroundColor: activeMaterials.map((_, index) =>
                                                            `rgba(${(index * 50) % 255}, ${(index * 80) % 255}, ${(index * 100) % 255}, 0.2)`
                                                        ),
                                                        borderColor: activeMaterials.map((_, index) =>
                                                            `rgba(${(index * 50) % 255}, ${(index * 80) % 255}, ${(index * 100) % 255}, 1)`
                                                        ),
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    plugins: {
                                                        legend: {
                                                            display: false
                                                        },
                                                        tooltip: {
                                                            enabled: true
                                                        }
                                                    },
                                                    scales: {
                                                        x: {
                                                            title: {
                                                                display: true,
                                                                text: 'Material',
                                                                font: {
                                                                    size: 16
                                                                }
                                                            },
                                                            ticks: {
                                                                autoSkip: false
                                                            }
                                                        },
                                                        y: {
                                                            beginAtZero: true,
                                                            ticks: {
                                                                stepSize: 1,
                                                                callback: function(value) {
                                                                    return Number.isInteger(value) ? value : '';
                                                                }
                                                            },
                                                            title: {
                                                                display: true,
                                                                text: 'Jumlah Stok',
                                                                font: {
                                                                    size: 16
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            });

                                            const legendContainer = document.getElementById('chartLegend');
                                            activeMaterials.forEach((material, index) => {
                                                const legendItem = document.createElement('span');
                                                legendItem.style.display = 'inline-block';
                                                legendItem.style.margin = '0 10px';
                                                legendItem.style.cursor = 'pointer';
                                                legendItem.style.fontSize = '14px';
                                                legendItem.style.textDecoration = material.hidden ? 'line-through' : 'none';

                                                legendItem.innerHTML = `
                                                <span style="
                                                    display: inline-block;
                                                    width: 12px;
                                                    height: 12px;
                                                    background-color: rgba(${(index * 50) % 255}, ${(index * 80) % 255}, ${(index * 100) % 255}, 1);
                                                    margin-right: 5px;
                                                "></span>${material.nama}`;

                                                legendItem.addEventListener('click', () => {
                                                    material.hidden = !material.hidden;

                                                    const filteredData = activeMaterials.filter(item => !item.hidden);

                                                    barChart.data.labels = filteredData.map(item => item.nama);
                                                    barChart.data.datasets[0].data = filteredData.map(item => item.total_stok);
                                                    barChart.update();

                                                    legendItem.style.textDecoration = material.hidden ? 'line-through' : 'none';
                                                });

                                                legendContainer.appendChild(legendItem);
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- End Grafik Stok Barang -->
                    </div>
                </div>
                <!-- End Left side columns -->

                <div class="col-lg-4">
                    <!-- Calendar Card remains the same -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kalender</h5>
                            <div id="calendar-container">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <button class="btn btn-outline-secondary" id="prevMonth">&lt;</button>
                                    <div>
                                        <select id="monthSelect"
                                            class="form-select d-inline-block w-auto me-2"></select>
                                        <select id="yearSelect" class="form-select d-inline-block w-auto"></select>
                                    </div>
                                    <button class="btn btn-outline-secondary" id="nextMonth">&gt;</button>
                                </div>
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Sun</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="calendar-body"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Card (Replacing Weather Card) -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Catatan</h5>
                            <div id="notes-container">
                                <div class="mb-3">
                                    <textarea class="form-control" id="noteInput" rows="3" placeholder="Tulis catatan baru..."></textarea>
                                </div>
                                <button class="btn btn-primary mb-3" onclick="addNote()">Tambah Catatan</button>

                                <div id="notes-list">
                                    <!-- Notes will be dynamically added here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Load notes from localStorage when page loads
                    document.addEventListener('DOMContentLoaded', function() {
                        loadNotes();
                    });

                    function addNote() {
                        const noteInput = document.getElementById('noteInput');
                        const noteText = noteInput.value.trim();

                        if (noteText) {
                            const notes = getNotes();
                            notes.push({
                                text: noteText,
                                date: new Date().toLocaleString('id-ID')
                            });
                            localStorage.setItem('notes', JSON.stringify(notes));

                            noteInput.value = '';
                            loadNotes();
                        }
                    }

                    function deleteNote(index) {
                        const notes = getNotes();
                        notes.splice(index, 1);
                        localStorage.setItem('notes', JSON.stringify(notes));
                        loadNotes();
                    }

                    function getNotes() {
                        return JSON.parse(localStorage.getItem('notes') || '[]');
                    }

                    function loadNotes() {
                        const notesList = document.getElementById('notes-list');
                        const notes = getNotes();

                        notesList.innerHTML = notes.map((note, index) => `
                            <div class="card mb-2">
                                <div class="card-body">
                                    <p class="mb-1">${note.text}</p>
                                    <small class="text-muted d-block">${note.date}</small>
                                    <button class="btn btn-sm btn-danger mt-2" onclick="deleteNote(${index})">Hapus</button>
                                </div>
                            </div>
                        `).join('');
                    }
                </script>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= footer ======= -->
    @include('footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!--Calendernya-->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const calendarBody = document.getElementById("calendar-body");
            const monthSelect = document.getElementById("monthSelect");
            const yearSelect = document.getElementById("yearSelect");
            const prevMonth = document.getElementById("prevMonth");
            const nextMonth = document.getElementById("nextMonth");

            const today = new Date();
            let currentMonth = today.getMonth();
            let currentYear = today.getFullYear();

            const monthNames = [
                "January", "February", "March", "April", "May",
                "June", "July", "August", "September", "October", "November", "December"
            ];

            function populateSelectors() {
                monthSelect.innerHTML = "";
                monthNames.forEach((month, index) => {
                    const option = document.createElement("option");
                    option.value = index;
                    option.textContent = month;
                    if (index === currentMonth) option.selected = true;
                    monthSelect.appendChild(option);
                });

                yearSelect.innerHTML = "";
                for (let i = currentYear - 10; i <= currentYear + 10; i++) {
                    const option = document.createElement("option");
                    option.value = i;
                    option.textContent = i;
                    if (i === currentYear) option.selected = true;
                    yearSelect.appendChild(option);
                }
            }

            function generateCalendar(month, year) {
                calendarBody.innerHTML = "";
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const prevMonthDays = new Date(year, month, 0).getDate();

                let date = 1;
                let prevMonthDate = prevMonthDays - firstDay + 1;

                for (let i = 0; i < 6; i++) {
                    const row = document.createElement("tr");

                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement("td");
                        cell.classList.add("calendar-day");

                        if (i === 0 && j < firstDay) {
                            cell.textContent = prevMonthDate++;
                            cell.classList.add("text-muted");
                        } else if (date > daysInMonth) {
                            cell.textContent = date - daysInMonth;
                            date++;
                            cell.classList.add("text-muted");
                        } else {
                            cell.textContent = date;

                            // Store the full date as a data attribute
                            const fullDate = new Date(year, month, date);
                            cell.dataset.fullDate = fullDate.toISOString().split('T')[0];

                            if (date === today.getDate() && year === today.getFullYear() && month === today
                                .getMonth()) {
                                cell.classList.add("today");
                            }

                            // Modify the click handler to filter the DataTable
                            cell.addEventListener("click", () => {
                                // Remove selected class from all cells
                                document.querySelectorAll(".calendar-day.selected").forEach((el) => {
                                    el.classList.remove("selected");
                                });
                                cell.classList.add("selected");

                                // Get the DataTable instance
                                const suratJalanTable = $('#suratJalanTable').DataTable();

                                // Format the selected date to match the table format
                                const selectedDate = formatDate(fullDate);

                                // Clear existing search and apply new filter
                                suratJalanTable
                                    .columns(1) // Index of the Tanggal Diminta column
                                    .search(selectedDate)
                                    .draw();
                            });

                            date++;
                        }
                        row.appendChild(cell);
                    }
                    calendarBody.appendChild(row);
                }
            }

            // Function to format date to match the table format (e.g., "12 Dec 2024")
            function formatDate(date) {
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                const day = date.getDate();
                const month = months[date.getMonth()];
                const year = date.getFullYear();
                return `${day} ${month} ${year}`;
            }

            // Modify the DataTable initialization
            $('#suratJalanTable').DataTable({
                searching: true,
                ordering: true,
                paging: true,
                language: {
                    search: "Pencarian:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada data yang tersedia",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                },
                // Add custom search functionality
                // initComplete: function() {
                //     // Add a clear filter button
                //     const clearButton = $('<button>')
                //         .text('Tampilkan Semua')
                //         .addClass('btn btn-secondary btn-sm ms-2')
                //         .on('click', function() {
                //             const table = $('#suratJalanTable').DataTable();
                //             table.search('').columns().search('').draw();
                //             document.querySelectorAll(".calendar-day.selected").forEach((el) => {
                //                 el.classList.remove("selected");
                //             });
                //         });

                //     $('#suratJalanTable_filter').append(clearButton);
                // }
            });
            prevMonth.addEventListener("click", () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentMonth, currentYear);
            });

            nextMonth.addEventListener("click", () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentMonth, currentYear);
            });

            monthSelect.addEventListener("change", (e) => {
                currentMonth = parseInt(e.target.value);
                generateCalendar(currentMonth, currentYear);
            });

            yearSelect.addEventListener("change", (e) => {
                currentYear = parseInt(e.target.value);
                generateCalendar(currentMonth, currentYear);
            });

            populateSelectors();
            generateCalendar(currentMonth, currentYear);
        });
    </script>
    <!--End calender-->


    <!--Buat Grafiknya-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const legendContainer = document.getElementById('legendContainer');
            const barChart = new Chart(document.getElementById('barChart'), {
                type: 'bar',
                data: {
                    labels: filteredData.map(item => item.nama),
                    datasets: [{
                        label: 'Total Stok',
                        data: filteredData.map(item => item.total_stok),
                        backgroundColor: '#007bff'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false // Supaya custom legend bisa digunakan
                        }
                    }
                }
            });

            // Generate custom legend
            legendContainer.innerHTML = ''; // Clear existing legends if any
            filteredData.forEach((material, index) => {
                const legendItem = document.createElement('div');
                legendItem.className = 'filter-label';
                legendItem.innerHTML = `
                <div class="filter-box"></div>
                     <span>${material.nama}</span>
                    `;

                // Set initial style for legend text
                const legendText = legendItem.querySelector('span');
                legendText.style.textDecoration = material.hidden ? 'line-through' : 'none';

                // Event listener to toggle visibility
                legendItem.addEventListener('click', () => {
                    const meta = barChart.getDatasetMeta(0);
                    meta.data[index].hidden = !meta.data[index].hidden;
                    material.hidden = meta.data[index].hidden;

                    // Update text style based on visibility
                    legendText.style.textDecoration = material.hidden ? 'line-through' : 'none';

                    barChart.update();
                });

                legendContainer.appendChild(legendItem);
            });

            // Tombol untuk mengurutkan stok
            const sortToggle = document.getElementById('sortToggle');
            sortToggle.addEventListener('change', () => {
                if (sortToggle.checked) {
                    activeMaterials.sort((a, b) => b.total_stok - a.total_stok);
                } else {
                    activeMaterials.sort((a, b) => materialData.findIndex(item => item.nama === a.nama) -
                        materialData.findIndex(item => item.nama === b.nama));
                }

                // Update chart data
                barChart.data.labels = activeMaterials.map(item => item.nama);
                barChart.data.datasets[0].data = activeMaterials.map(item => item.total_stok);
                barChart.update();
            });
        });
    </script>
    <!--Buat Grafiknya-->

    <script>
        // Load notes from localStorage when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadNotes();
        });

        function addNote() {
            const noteInput = document.getElementById('noteInput');
            const noteText = noteInput.value.trim();

            if (noteText) {
                const notes = getNotes();
                notes.push({
                    text: noteText,
                    date: new Date().toLocaleString('id-ID')
                });
                localStorage.setItem('notes', JSON.stringify(notes));

                noteInput.value = '';
                loadNotes();
            }
        }

        function deleteNote(index) {
            const notes = getNotes();
            notes.splice(index, 1);
            localStorage.setItem('notes', JSON.stringify(notes));
            loadNotes();
        }

        function getNotes() {
            return JSON.parse(localStorage.getItem('notes') || '[]');
        }

        function loadNotes() {
            const notesList = document.getElementById('notes-list');
            const notes = getNotes();

            notesList.innerHTML = notes.map((note, index) => `
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="mb-1">${note.text}</p>
                        <small class="text-muted d-block">${note.date}</small>
                        <button class="btn btn-sm btn-danger mt-2" onclick="deleteNote(${index})">Hapus</button>
                    </div>
                </div>
            `).join('');
        }
    </script>
</body>

</html>
