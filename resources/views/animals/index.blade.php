@include('partials.header')
<?php $array = array('title' => 'Veterinary Dashboard') ;?>
<x-nav :data="$array"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<div class="flex flex-col min-h-screen mt-10">
    <!-- Main Content Area -->
    <main class="flex-grow bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <!-- Cards Section -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
                <!-- Card 1: Total Patients -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-2">Total Patients</h2>
                    <p class="text-gray-600 text-xl">{{ $patientCount }}</p>
                </div>
                <!-- Card 2: Appointments Today -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-2">Appointments Today</h2>
                    <p class="text-gray-600 text-xl">{{ $appointmentsCountToday }}</p>
                </div>
                <!-- Card 3: Revenue -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-2">Revenue</h2>
                    <p class="text-gray-600 text-xl">$15,000</p>
                </div>
                <!-- Card 4: Medications -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-2">Medications in Stock</h2>
                    <p class="text-gray-600 text-xl">250</p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Sales Overview</h2>
                <!-- Placeholder Chart -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <img src="{{ asset('img/veterinary-chart.png') }}" alt="Sales Overview Chart" class="w-full">
                </div>
            </div>
        </div>
    </main>
@include('partials.footer')




