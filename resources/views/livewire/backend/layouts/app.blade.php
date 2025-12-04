<!DOCTYPE html>
<html lang="en">
    @php
        $setting = App\Models\Settings::with("favIcon")->first();
    @endphp

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>{{ $title ?? "CareOn" }}</title>
        <link rel="website icon" type="png" href="{{ asset(@$setting->favIcon?->path) }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap"
            rel="stylesheet">
        @vite("resources/css/app.css")
        <!-- Include Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

        <style>
            /* For Firefox */
            input[type="number"] {
                -moz-appearance: textfield;
            }

            /* For Chrome, Safari, Edge, Opera */
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Custom scrollbar styles */
            ::-webkit-scrollbar {
                width: 5px;
                /* Adjust width of the scrollbar */
            }

            ::-webkit-scrollbar-thumb {
                background-color: #d1d6e0;
                /* Thumb color (gray) */
                border-radius: 10px;
                /* Rounded corners for the scrollbar */
            }

            ::-webkit-scrollbar-track {
                background-color: #f3f4f6;
                /* Track color (light gray) */
                border-radius: 10px;
                /* Rounded corners for the track */
            }

            /* Optionally, you can style the scrollbar on hover */
            ::-webkit-scrollbar-thumb:hover {
                background-color: #4b5563;
                /* Darker thumb color on hover */
            }
        </style>
    </head>

    <body class="font-[Figtree]">
        <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');
        setColors(color);" :class="{ 'dark': isDark }">
            <div class="flex h-screen antialiased text-gray-700 bg-[#F1F5F9] dark:bg-gray-900 dark:text-white">
                <!-- Sidebar -->

                @include("livewire.backend.layouts.sidebar")
                <!-- Main Content -->
                <div class="flex-1 flex flex-col h-full overflow-x-hidden overflow-y-auto">
                    <!-- Header -->
                    @include("livewire.backend.layouts.header")
                    <!-- Page Content -->
                    <main class="px-3">
                        @yield("content")
                    </main>
                </div>
            </div>
        </div>
        <script src="{{ asset("assets/js/script.js") }}"></script>
        <script>
            const setup = () => {
                const getTheme = () => {
                    if (window.localStorage.getItem('dark')) {
                        return JSON.parse(window.localStorage.getItem('dark'))
                    }

                    return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
                }

                const setTheme = (value) => {
                    window.localStorage.setItem('dark', value)
                }

                const getColor = () => {
                    if (window.localStorage.getItem('color')) {
                        return window.localStorage.getItem('color')
                    }
                    return 'cyan'
                }

                const setColors = (color) => {
                    const root = document.documentElement
                    root.style.setProperty('--color-primary', `var(--color-${color})`)
                    root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
                    root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
                    root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
                    root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
                    root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
                    root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
                    this.selectedColor = color
                    window.localStorage.setItem('color', color)
                    //
                }

                const updateBarChart = (on) => {
                    const data = {
                        data: randomData(),
                        backgroundColor: 'rgb(207, 250, 254)',
                    }
                    if (on) {
                        barChart.data.datasets.push(data)
                        barChart.update()
                    } else {
                        barChart.data.datasets.splice(1)
                        barChart.update()
                    }
                }

                const updateDoughnutChart = (on) => {
                    const data = random()
                    const color = 'rgb(207, 250, 254)'
                    if (on) {
                        doughnutChart.data.labels.unshift('Seb')
                        doughnutChart.data.datasets[0].data.unshift(data)
                        doughnutChart.data.datasets[0].backgroundColor.unshift(color)
                        doughnutChart.update()
                    } else {
                        doughnutChart.data.labels.splice(0, 1)
                        doughnutChart.data.datasets[0].data.splice(0, 1)
                        doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
                        doughnutChart.update()
                    }
                }

                const updateLineChart = () => {
                    lineChart.data.datasets[0].data.reverse()
                    lineChart.update()
                }

                return {
                    loading: true,
                    isDark: getTheme(),
                    toggleTheme() {
                        this.isDark = !this.isDark
                        setTheme(this.isDark)
                    },
                    setLightTheme() {
                        this.isDark = false
                        setTheme(this.isDark)
                    },
                    setDarkTheme() {
                        this.isDark = true
                        setTheme(this.isDark)
                    },
                    color: getColor(),
                    selectedColor: 'cyan',
                    setColors,
                    toggleSidbarMenu() {
                        this.isSidebarOpen = !this.isSidebarOpen
                    },
                    isSettingsPanelOpen: false,
                    openSettingsPanel() {
                        this.isSettingsPanelOpen = true
                        this.$nextTick(() => {
                            this.$refs.settingsPanel.focus()
                        })
                    },
                    isNotificationsPanelOpen: false,
                    openNotificationsPanel() {
                        this.isNotificationsPanelOpen = true
                        this.$nextTick(() => {
                            this.$refs.notificationsPanel.focus()
                        })
                    },
                    isSearchPanelOpen: false,
                    openSearchPanel() {
                        this.isSearchPanelOpen = true
                        this.$nextTick(() => {
                            this.$refs.searchInput.focus()
                        })
                    },
                    isMobileSubMenuOpen: false,
                    openMobileSubMenu() {
                        this.isMobileSubMenuOpen = true
                        this.$nextTick(() => {
                            this.$refs.mobileSubMenu.focus()
                        })
                    },
                    isMobileMainMenuOpen: false,
                    openMobileMainMenu() {
                        this.isMobileMainMenuOpen = true
                        this.$nextTick(() => {
                            this.$refs.mobileMainMenu.focus()
                        })
                    },
                    updateBarChart,
                    updateDoughnutChart,
                    updateLineChart,
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- Tom Select -->
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
        <!-- Summernote Lite -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toastrOptions = {
                    progressBar: true,
                    timeOut: 3000,
                    closeButton: true,
                    positionClass: 'toast-top-right',
                };

                function showToast(type, message) {
                    if (message) {
                        toastr[type](message, '', toastrOptions);
                    }
                }

                // Event listener for success messages
                window.addEventListener('toastr:success', event => {
                    showToast('success', event.detail);
                });

                // Event listener for error messages
                window.addEventListener('toastr:error', event => {
                    showToast('error', event.detail);
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "timeOut": 3000,
                    "positionClass": "toast-top-right",
                };

                @if (session("success"))
                    toastr.success("{{ session("success") }}");
                @endif

                @if (session("error"))
                    toastr.error("{{ session("error") }}");
                @endif
            });
        </script>
    </body>

</html>
