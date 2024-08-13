<div class="page-inner">
    @include('admin.dashboard.components.breadcrumb')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid" aria-describedby="basic-datatables_info"
                                    style="width: 100%; overflow-x: auto;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Phòng: activate to sort column ascending"
                                                style="width: 20%;">Phòng</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Ca 1: activate to sort column ascending"
                                                style="width: 15%;">Ca 1 <br> 07:00 - 09:00</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Ca 2: activate to sort column ascending"
                                                style="width: 15%;">Ca 2 <br> 09:15 - 11:15</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Ca 3: activate to sort column ascending"
                                                style="width: 15%;">Ca 3 <br> 12:00 - 14:00</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Ca 4: activate to sort column ascending"
                                                style="width: 15%;">Ca 4 <br> 14:15 - 16:15</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Ca 5: activate to sort column ascending"
                                                style="width: 15%;">Ca 5 <br> 16:30 - 18:30</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr role="row">
                                                <td style="white-space: nowrap;">{{ $room->name }}</td>
                                                @foreach (range(1, 5) as $shiftNumber)
                                                    <td style="white-space: nowrap;">
                                                        @forelse ($schedulesToday->where('classroom_id', $room->id)
                                                            ->where('school_shift_id', $shiftNumber) as $schedule)
                                                            <p class="text-center">
                                                                {{ $schedule->classSubject->subject->name }}<br>
                                                                {{ $schedule->classSubject->class->name }}<br>
                                                                {{ $schedule->classSubject->teacher->name }}<br>
                                                                {{ $schedule->classSubject->subject->code }}
                                                                
                                                            </p>
                                                        @empty
                                                            <span></span>
                                                        @endforelse
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
