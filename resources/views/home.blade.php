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

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    {{-- Style Buat Calender --}}
    <style>
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
    </style>
    {{-- End Style Buat Calender --}}

    <!-- Template Main CSS File -->
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">

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
                        <a href="{{ url('daftar-permintaan-material') }}" class="card info-card sales-card text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title">DAFTAR PERMINTAAN MATERIAL/DPB</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
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
                                <h5 class="card-title">BON PEMAKAIAN MATERIAL</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-box-seam-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $k7jumlah }}</h6>
                                        <span>Jumlah</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Customers Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                            <h5 class="card-title">BON PENGEMBALIAN MATERIAL </span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-dropbox"></i>
                                </div>
                                <div class="ps-3">
                                <h6>{{ $k3jumlah }}</h6>
                                <span>Jumlah</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Reports -->
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Status Surat Jalan</h5>
                                <table class="table table-borderless datatable" id="suratJalanTable">
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
                                            <th scope="row" style="{{ $sj->ndpb == null ? "text-align: center" : "" }}">{{ $sj->ndpb != null ? $sj->ndpb : "-" }}</a></th>
                                            <td style="{{ $sj->tgl == null ? "text-align: center" : "" }}">{{ $sj->tgl != null ? \Carbon\Carbon::parse($sj->tgl)->format('d M Y') : "-" }}</td>
                                            <td>{{ $sj->nmuser }}</td>
                                            <td><span class="{{ $sj->nsurat != null ? "badge bg-success" : "badge bg-warning" }}">{{ $sj->nsurat != null ? "Sudah dicetak" : "Belum dicetak" }}</span></td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->


                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                            <h5 class="card-title">Barang Keluar</h5>
                                <table class="table table-borderless datatable" id="suratJalanTable">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah</th>
                                        <th>Tanggal Keluar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($materialKeluar as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jumlah_diminta }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tgl_keluar)->format('d M Y') }}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->

                    <!--Grafik Batang-->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Grafik Permintaan Material Bulan Ini</h5>

                                <!-- Grafik Batang -->
                                <canvas id="barChart" style="max-height: 400px;"></canvas>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new Chart(document.querySelector('#barChart'), {
                                            type: 'bar',
                                            data: {
                                                labels: ['DPM', 'K7', 'K3'],
                                                datasets: [
                                                    {
                                                        barThickness: 75,                                        
                                                        data: [4, 0, 1],
                                                        backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)',
                                                        'rgba(255, 205, 86, 0.2)'
                                                        ],
                                                        borderColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(255, 159, 64)',
                                                        'rgb(255, 205, 86)'
                                                        ],
                                                        borderWidth: 1
                                                    }
                                                ]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                    beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    });
                                </script>
                                <!-- End Bar Chart -->
                            </div>
                        </div>
                    </div>
                    <!-- Top Selling -->
                    <!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body ">
                    <div id="calendar-container">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                        <button class="btn btn-outline-secondary" id="prevMonth">&lt;</button>
                        <div>
                            <select id="monthSelect" class="form-select d-inline-block w-auto me-2"></select>
                            <select id="yearSelect" class="form-select d-inline-block w-auto"></select>
                        </div>
                        <button class="btn btn-outline-secondary" id="nextMonth">&gt;</button>
                        </div>
                        <table class="table table-bordered">
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

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const today = new Date();
                    let currentDate = new Date();
                    const calendarBody = document.getElementById('calendar-body');
                    const monthSelect = document.getElementById('monthSelect');
                    const yearSelect = document.getElementById('yearSelect');
                    const prevMonthBtn = document.getElementById('prevMonth');
                    const nextMonthBtn = document.getElementById('nextMonth');

                    const suratJalanTable = document.getElementById('suratJalanTable').getElementsByTagName('tbody')[0];

                    // Populate month select
                    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    const monthsShort = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; // short names for format d M Y

                    months.forEach((month, index) => {
                        const option = document.createElement('option');
                        option.value = index;
                        option.textContent = month;
                        monthSelect.appendChild(option);
                    });

                    // Populate year select (100 years range)
                    const currentYear = today.getFullYear();
                    for (let year = currentYear - 50; year <= currentYear + 50; year++) {
                        const option = document.createElement('option');
                        option.value = year;
                        option.textContent = year;
                        yearSelect.appendChild(option);
                    }

                    function generateCalendar(year, month) {
                        const firstDay = new Date(year, month, 1);
                        const lastDay = new Date(year, month + 1, 0);
                        const daysInMonth = lastDay.getDate();
                        const startingDay = firstDay.getDay();

                        monthSelect.value = month;
                        yearSelect.value = year;

                        let dayCount = 1;
                        let html = '';

                        for (let i = 0; i < 6; i++) {
                            html += '<tr>';
                            for (let j = 0; j < 7; j++) {
                                if (i === 0 && j < startingDay) {
                                    html += '<td></td>';
                                } else if (dayCount > daysInMonth) {
                                    html += '<td></td>';
                                } else {
                                    const isToday = (dayCount === today.getDate() && month === today.getMonth() && year === today.getFullYear());
                                    const todayClass = isToday ? ' today' : '';
                                    html += `<td class="calendar-day${todayClass}" data-date="${year}-${month+1}-${dayCount}">${dayCount}</td>`;
                                    dayCount++;
                                }
                            }
                            html += '</tr>';
                            if (dayCount > daysInMonth) break;
                        }

                        calendarBody.innerHTML = html;

                        // Add click event listeners to calendar days
                        const calendarDays = document.querySelectorAll('.calendar-day');
                        calendarDays.forEach(day => {
                            day.addEventListener('click', function() {
                                calendarDays.forEach(d => d.classList.remove('selected'));
                                this.classList.add('selected');
                                const selectedDate = this.dataset.date;
                                console.log('Selected date:', selectedDate);
                                filterTableByDate(selectedDate);
                            });
                        });
                    }

                    function filterTableByDate(selectedDate) {
                        const rows = suratJalanTable.getElementsByTagName('tr');
                        const selectedDateFormatted = formatDateToDMY(selectedDate);

                        Array.from(rows).forEach(row => {
                            const tglCell = row.cells[1].textContent.trim(); // Ambil kolom tanggal
                            if (tglCell === selectedDateFormatted) {
                                row.style.display = ''; // Tampilkan baris jika sesuai
                            } else {
                                row.style.display = 'none'; // Sembunyikan baris jika tidak sesuai
                            }
                        });
                    }

                    function formatDateToDMY(dateStr) {
                        // Mengubah format YYYY-MM-DD dari dataset ke d M Y
                        const dateParts = dateStr.split('-');
                        if (dateParts.length === 3) {
                            const year = dateParts[0];
                            const month = parseInt(dateParts[1]) - 1; // Konversi ke index bulan (0-based)
                            const day = dateParts[2].padStart(2, '0');
                            return `${day} ${monthsShort[month]} ${year}`; // Format jadi d M Y
                        }
                        return null;
                    }

                    generateCalendar(currentDate.getFullYear(), currentDate.getMonth());

                    prevMonthBtn.addEventListener('click', function() {
                        currentDate.setMonth(currentDate.getMonth() - 1);
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                    });

                    nextMonthBtn.addEventListener('click', function() {
                        currentDate.setMonth(currentDate.getMonth() + 1);
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                    });

                    monthSelect.addEventListener('change', function() {
                        currentDate.setMonth(parseInt(this.value));
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                    });

                    yearSelect.addEventListener('change', function() {
                        currentDate.setFullYear(parseInt(this.value));
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                    });

                    // View options
                    document.getElementById('viewToday').addEventListener('click', function() {
                        currentDate = new Date();
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                    });

                    document.getElementById('viewThisMonth').addEventListener('click', function() {
                        currentDate = new Date();
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                    });

                    document.getElementById('viewThisYear').addEventListener('click', function() {
                        currentDate = new Date(today.getFullYear(), currentDate.getMonth(), 1);
                        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                    });
                });
                </script>

            </div><!-- End Right side columns -->
        </div>
    </section>
</main><!-- End #main -->

<!-- ======= footer ======= -->
@include('footer')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/quill/quill.js')}}"></script>
<script src="{{asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('admin/assets/js/main.js')}}"></script>

</body>

</html>