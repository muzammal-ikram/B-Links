    <div class="col">
            <div class="btn-group task-list-action">
                <div class="dropdown">
                    <a href="#"
                        class="btn btn-transparent border p-2 default-color dropdown-hover p-0"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class=" icon-options"></i>
                    </a>

                <div class="dropdown-menu" x-placement="bottom-start"
                            style="position: absolute; transform: translate3d(0px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">

                    <a class="dropdown-item"
                       href="{{ route('show-contractor', $con->id) }}"> <i
                            class="ti-eye text-primary pr-2"></i> Show </a>

                        @php
                            $nowDate        =  Carbon\Carbon::now();
                            $last7Days      = $con->comm_deadline->subDays(7);
                            $comm_deadline  = $con->comm_deadline;
                        @endphp
                        @if($nowDate >= $last7Days && $nowDate <= $comm_deadline)
                            <a class="dropdown-item"
                            href="{{ url('/debit-note', $con->id) }}"> <i
                                class="glyphicon glyphicon-pencil"></i> Debit Note</a>
                        @endif
                        <a class="dropdown-item"
                            href="{{ route('edit-contractor', $con->id) }}"> <i
                                class="ti-pencil-alt text-warning pr-2"></i> Edit </a>


                        <a class="dropdown-item"
                        href="javascript:void(0)"
                        data-toggle="modal"
                        data-target="#attach-export-modal-{{ $con->id }}" > <i
                                class="icon-close text-danger pr-2"></i> Delete </a>
                    </div>

                </div>
            </div>
    </div>


    <div class="modal fade" id="attach-export-modal-{{ $con->id }}"
            tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="mySmallModalLabel">
                            Delete User:
                            <strong>Name</strong></h6>
                        <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>Are you sure?</h6><br>
                        <form
                            action="{{ route('delete-contractor', $con->id) }}"
                            method="get">
                            @csrf
                            {{-- <input name="_method" type="hidden"
                                value="DELETE"> --}}
                            <div class="float-right">
                                <button type="submit"
                                        class="btn btn-primary mx-a">Yes
                                </button>
                                <button type="button"
                                        class="btn btn-secondary mx-a"
                                        data-dismiss="modal">No
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
