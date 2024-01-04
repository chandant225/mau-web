<div>
    <div class="relative">
        <div class="col-lg-12 d-flex flex-row pt-3" style="justify-content: end ">
            <div class="form-group mr-2">
                <input id="datetime" wire:model="selectedDate" type="date" class="form-control"
                    placeholder="Appointment Date">
            </div>
            <button class="btn btn-primary " style="padding: 0 20px; height:40px" wire:click="filterAppointments()">Filter</button>
        </div>
        <div class="pl-2">
            @if ($selectedDate)
                <p>Selected Date: {{ $selectedDate }}</p>
            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Appointment Form Details</h3>
                </div>
                <!-- /.card-header -->
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if ($filterData)
                            @if (count($filteredAppointments) === 0)
                                <p style="background: #288d64; color:#fff; text-align:center; padding:1rem">There is no
                                    appointment on this
                                    date.</p>
                            @endif
                            @foreach ($filteredAppointments as $appointment)
                                <tbody>
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->fullName }}</td>
                                        <td>{{ $appointment->email }}</td>
                                        <td>{{ $appointment->phone }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->message }}</td>
                                        <td class="d_flex">
                                            <button wire:click="deleteAppointments({{ $appointment->id }})"
                                                type="submit" class="btn btn-danger ml-2">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        @endif
                        @if (!$filterData)
                            @foreach ($Appointments as $appointment)
                                <tbody>
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->fullName }}</td>
                                        <td>{{ $appointment->email }}</td>
                                        <td>{{ $appointment->phone }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->message }}</td>
                                        <td class="d_flex">
                                            <button wire:click="deleteAppointments({{ $appointment->id }})"
                                                type="submit" class="btn btn-danger ml-2">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        @endif
                    </table>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('refreshComponent', function() {
                Livewire.emit('refreshComponent');
            });
        });
    </script>
@endpush
