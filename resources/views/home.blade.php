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

	{{-- <link rel="stylesheet" href="{{asset('calender/css/style.css')}}"> --}}

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
                                    <h5 class="card-title">BON PEMAKAIAN MATERIAL</h5>
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
                        </div><!-- End Customers Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">BON PENGEMBALIAN MATERIAL </span></h5>
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
                                                    <th scope="row"
                                                        style="{{ $sj->ndpb == null ? 'text-align: center' : '' }}">
                                                        {{ $sj->ndpb != null ? $sj->ndpb : '-' }}</a></th>
                                                    <td style="{{ $sj->tgl == null ? 'text-align: center' : '' }}">
                                                        {{ $sj->tgl != null ? \Carbon\Carbon::parse($sj->tgl)->format('d M Y') : '-' }}
                                                    </td>
                                                    <td>{{ $sj->nmuser }}</td>
                                                    <td><span
                                                            class="{{ $sj->nsurat != null ? 'badge bg-success' : 'badge bg-warning' }}">{{ $sj->nsurat != null ? 'Sudah dicetak' : 'Belum dicetak' }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->


                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Grafik Stok Barang Tersedia</h5>

                                    <!-- Tombol Filter dan Label Material -->
                                    <div class="d-flex align-items-center mb-3">
                                        <label for="sortToggle" class="filter-label me-4">
                                            <input type="checkbox" id="sortToggle" class="d-none">
                                            <span class="filter-box"></span>
                                            Urutkan Stok Terbesar ke Kecil
                                        </label>
                                    </div>

                                    <!-- Grafik Batang -->
                                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                                    <div id="chartLegend" style="text-align: center; margin-top: 15px;">
                                        <!-- Legend akan di-render di sini -->
                                    </div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            // Data barang dan stok yang dikirim dari controller
                                            const materialData = @json($materialStok);

                                            // Membuat salinan data untuk mengelola status hide/unhide
                                            const activeMaterials = materialData.map(item => ({
                                                nama: item.nama,
                                                total_stok: item.total_stok,
                                                hidden: false
                                            }));

                                            // Inisialisasi chart.js
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
                                                            display: false // Disable default legend
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
                                                                    return Number.isInteger(value) ? value : ''; // Hanya angka bulat
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

                                            // Custom Legend Rendering
                                            const legendContainer = document.getElementById('chartLegend');
                                            activeMaterials.forEach((material, index) => {
                                                const legendItem = document.createElement('span');
                                                legendItem.style.display = 'inline-block';
                                                legendItem.style.margin = '0 10px';
                                                legendItem.style.cursor = 'pointer';
                                                legendItem.style.fontSize = '14px';
                                                legendItem.style.textDecoration = material.hidden ? 'line-through' : 'none';

                                                // Warna untuk legenda
                                                legendItem.innerHTML = `
                                                <span style="
                                                    display: inline-block;
                                                    width: 12px;
                                                    height: 12px;
                                                    background-color: rgba(${(index * 50) % 255}, ${(index * 80) % 255}, ${(index * 100) % 255}, 1);
                                                    margin-right: 5px;
                                                "></span>${material.nama}`;

                                                // Toggle fungsi klik untuk meng-hide grafik
                                                legendItem.addEventListener('click', () => {
                                                    // Toggle status hidden
                                                    material.hidden = !material.hidden;

                                                    // Update data dan label aktif
                                                    const filteredData = activeMaterials.filter(item => !item.hidden);

                                                    // Update chart
                                                    barChart.data.labels = filteredData.map(item => item.nama);
                                                    barChart.data.datasets[0].data = filteredData.map(item => item.total_stok);

                                                    barChart.update();

                                                    // Update coretan pada legend
                                                    legendItem.style.textDecoration = material.hidden ? 'line-through' : 'none';
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
                                    <!-- End Bar Chart -->
                                </div>
                            </div>
                        </div>

                        <style>
                            .filter-label {
                                display: flex;
                                align-items: center;
                                cursor: pointer;
                                font-size: 16px;
                            }

                            .filter-box {
                                width: 20px;
                                height: 20px;
                                border: 2px solid #007bff;
                                border-radius: 4px;
                                margin-right: 10px;
                                transition: background-color 0.3s;
                            }

                            input#sortToggle:checked+.filter-box {
                                background-color: #007bff;
                            }

                            input#sortToggle+.filter-box {
                                background-color: transparent;
                            }
                        </style>

                        <!-- End Bar Chart -->
                    </div>
                </div>
            </div>

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

            </div><!-- End Right side columns -->
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
</body>
</html>
