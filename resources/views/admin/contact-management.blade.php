@extends('admin.layouts.master')

@section('title', 'Contact Us Messages')

@section('content')
<style>
    .swal2-container {
        z-index: 99999 !important;
    }
    .message-cell {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
    <section class="nftmax-adashboard nftmax-show">
        <div class="nftmax-adashboard-left">
            {{-- contact messages table --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="contactTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="15%">Name</th>
                                    <th scope="col" width="20%">Email</th>
                                    <th scope="col" width="15%">Subject</th>
                                    <th scope="col" class="message-cell">Message</th>
                                    <th scope="col" width="15%">Date</th>
                                    <th scope="col" width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($data as $contact)
                                    <tr id="contact-row-{{ $contact->id }}">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ Str::limit($contact->subject, 20) }}</td>
                                        <td class="message-cell" title="{{ $contact->message }}">
                                            {{ Str::limit($contact->message, 30) }}
                                        </td>
                                        <td>{{ $contact->created_at->format('d M Y') }}</td>
                                        <td>
                                            <button class="btn-one btn-sm btn-info view-message" 
                                                    data-id="{{ $contact->id }}"
                                                    data-name="{{ $contact->name }}"
                                                    data-email="{{ $contact->email }}"
                                                    data-subject="{{ $contact->subject }}"
                                                    data-message="{{ $contact->message }}"
                                                    data-date="{{ $contact->created_at->format('d M Y, h:i A') }}">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- View Message Modal -->
    <div class="modal fade" id="viewMessageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Message Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Name:</strong>
                            <p id="view-name" class="text-muted"></p>
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p id="view-email" class="text-muted"></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Subject:</strong>
                            <p id="view-subject" class="text-muted"></p>
                        </div>
                        <div class="col-md-6">
                            <strong>Date:</strong>
                            <p id="view-date" class="text-muted"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <strong>Message:</strong>
                            <p id="view-message" class="text-muted"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-one btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#contactTable').DataTable({
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 3, targets: -1 }
        ]
    });

    // View Message
    $(document).on('click', '.view-message', function() {
        $('#view-name').text($(this).data('name'));
        $('#view-email').text($(this).data('email'));
        $('#view-subject').text($(this).data('subject'));
        $('#view-message').text($(this).data('message'));
        $('#view-date').text($(this).data('date'));
        $('#viewMessageModal').modal('show');
    });


});
</script>
@endsection